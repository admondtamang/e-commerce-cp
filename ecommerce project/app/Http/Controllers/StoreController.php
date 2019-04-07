<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\controllers\controller;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    public function index()
    {
        return view('store.store');
    }
    public function order()
    {
        $menu_active = 2;
        $i = 0;
        //join query to display product related to store
        // $products=DB::where('store_id',1)->orderBy('created_at','desc')->get();
        $products = DB::table('orders')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->where('store_id', auth('store')->user()->id)
            ->get();
        return view('store.order', compact('menu_active', 'products', 'i'));
    }
    public function store(Request $req)
    { }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
