<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    protected $image_dir = "uploads/products";
    function index()
    {

        $menu_active = 2;
        $i = 0;
        $products = Product::where('store_id', 1)->orderBy('created_at', 'desc')->get();
        return view('store.products.index', compact('menu_active', 'products', 'i'));

        // $product = Product::find(all);
        // return view('store.products.index')->with('products', $product);
    }
    function create()
    {
        return view('store.products.create');
    }
    public function uploadFile($file, $dir)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = md5(time()) . '.' . $file_extension;
        $file->move($dir, $file_name);
        return $file_name;
    }

    public function show($id)
    { }
    function store()
    {
        $req = request();

        $this->validate($req, [
            'name' => 'required|min:5',
            'stock_quantity' => 'required|min:0',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);

        $form_req = $req->all();
        $product = new Product();
        if (request()->hasFile('image')) {
            $file_name = $this->uploadFile(request()->file('image'), $this->image_dir);
            $product->image = $file_name;
        }
        $product->name = $form_req['name'];
        $product->description = $form_req['description'];
        $product->price = $form_req['price'];
        $product->category_id = 1;

        $product->store_id = 1;
        $product->stock_quantity = $form_req['stock_quantity'];
        $product->stock_quantity = $form_req['stock_quantity'];
        $product->save();
        return redirect()->route('products.create')->with('message', 'Add Products Successfully!');
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
