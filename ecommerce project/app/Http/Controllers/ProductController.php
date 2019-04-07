<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    protected $image_dir = "uploads/products";

    public function index()
    {
        $menu_active = 2;
        $i = 0;

        // $product = Product::with('category')->get();
        // dd($product);
        $products = Product::where('store_id', auth('store')->user()->id)->orderBy('created_at', 'desc')->get();
        return view('store.products.index', compact('menu_active', 'products', 'i'));

        // return view('store.products.index')->with('products', $products);
    }
    public function create()
    {
        $categories = Category::where('parent_id', 0)->pluck('category', 'id')->all();
        return view('store.products.create', compact('categories'));
    }

    public function uploadFile($file, $dir)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = md5(time()) . '.' . $file_extension;
        $file->move($dir, $file_name);
        return $file_name;
    }

    public function store()
    {
        $req = request();

        $this->validate($req, [
            'name' => 'required|min:3',
            'stock_quantity' => 'required|min:0',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $form_req = $req->all();
        // $product = new Product();
        if (request()->hasFile('image')) {
            $file_name = $this->uploadFile(request()->file('image'), $this->image_dir);
            $form_req['image'] = $file_name;
        }
        $form_req['store_id'] = auth('store')->user()->id;
        // dd($form_req);
        Product::create($form_req);
        return redirect()->route('products.create')->with('message', 'Add Products Successfully!');
        // $product = new Product();
        // if (request()->hasFile('image')) {
        //     $file_name = $this->uploadFile(request()->file('image'), $this->image_dir);
        //     $product->image = $file_name;
        // }
        // $product->name = $form_req['name'];
        // $product->description = $form_req['description'];
        // $product->price = $form_req['price'];
        // $product->store_id = auth('store')->user()->id;
        // $product->stock_quantity = $form_req['stock_quantity'];
        // dd($product);
        // $product->save();
        // return redirect()->route('products.create')->with('message', 'Add Products Successfully!');
    }
    public function findStoreId($id)
    {
        $store_id = Product::where('id', $id)->first();
        return $store_id;
    }

    public function allProducts()
    {
        $product = Product::find(all);
        return view('allProducts')->with('products', $product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image && app('files')->exists($this->image_dir . '/' . $product->image)) {
            app('files')->delete($this->image_dir . '/' . $product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->withSuccess('product successfully deleted');
    }
}
