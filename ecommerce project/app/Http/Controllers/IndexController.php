<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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
    public function listByCat($id)
    {
        $list_product = Product::where('categories_id', $id)->get();
        $byCate = Category::select('category')->where('id', $id)->first();
        return view('frontEnd.products', compact('list_product', 'byCate'));
    }

    public function detialproduct($id)
    {
        $detail_product = Product::findOrFail($id);
        // $imagesGalleries = ImageGallery_model::where('products_id', $id)->get();
        // $totalStock = ProductAtrr_model::where('products_id', $id)->sum('stock');
        // $relateProducts = Product::where([['id', '!=', $id], ['categories_id', $detail_product->categories_id]])->get();
        return view('frontEnd.product_details', compact('detail_product'));
    }
}
