<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\controllers\controller;
use Illuminate\Http\Request;

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
    public function store(Request $req)
    { }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
