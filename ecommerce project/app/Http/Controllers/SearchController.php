<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search_name = $request->search;
        $search_data = Product::where('name', 'like', '%' . $search_name . '%')->get();
        return view('search')->with('products', $search_data);
    }
}
