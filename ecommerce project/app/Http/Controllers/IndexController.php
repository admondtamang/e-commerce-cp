<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Store;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function shop()
    {
        $products = Product::all();
        $byCate = "";
        return view('frontEnd.products', compact('products', 'byCate'));
    }
    public function viewUser()
    {
        $user = Store::all();
        return view('store')->with('users', $user);
    }
    public function listByCat($id)
    {
        $list_product = Product::where('category_id', $id)->get();
        $byCate = Category::select('category')->where('id', $id)->first();
        return view('frontEnd.products', compact('list_product', 'byCate'));
    }

    public function detialproduct($id)
    {
        $detail_product = Product::findOrFail($id);
        return view('frontEnd.product_details', compact('detail_product'));
    }
}
