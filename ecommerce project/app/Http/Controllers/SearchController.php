<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search_data = $request->search;
        Product::where('name', 'like', '%' . $search_data . '%')->get();
        return view('search')->with('search', $search_data);
    }
}
