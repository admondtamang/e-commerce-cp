<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\controllers\controller;
use Illuminate\Http\Request;
use App\Product;
use App\Store;
use App\Category;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admin');
    }

    public function viewCategory()
    {
        $category = Category::all();
        return view('admin/category/index')->with('category', $category);
    }

    public function allProducts()
    {
        $menu_active = 2;
        $i = 0;

        // $product = Product::with('category')->get();
        // dd($product);
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('menu_active', 'products', 'i'));
    }
    public function viewUser()
    {
        $user = Store::all();
        return view('admin.user')->with('users', $user);
    }
    public function verifyStore($id)
    {
        $store = Store::find($id);
        $store->status = 1;
        $store->save();
        return redirect()->route('admin.user')->with('message', 'User verified');
    }
    public function blacklist($id)
    {
        $store = Store::find($id);
        $store->status = 0;
        $store->save();
        return redirect()->route('admin.user')->with('message', 'User blacklisted');
    }
}
