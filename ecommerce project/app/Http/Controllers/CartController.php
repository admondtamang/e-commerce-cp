<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $session_id = Session::get('session_id');
        $cart_datas = Cart::where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->stock_quantity;
        }
        return view('frontEnd.cart', compact('cart_datas', 'total_price'));
    }

    public function addToCart(Request $request)
    {
        $this->validate(
            $request,
            [
                'stock' => 'required|min:0'
            ]
        );
        $inputToCart = $request->all();
        // dd($inputToCart);
        $stockAvailable = Product::select('stock_quantity')->where('id', $inputToCart['product_id'])->first();
        if ($stockAvailable['stock_quantity'] >= $inputToCart['stock']) {

            //if session is not available create one
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = str_random(40);
                Session::put('session_id', $session_id);
            }
            $inputToCart['session_id'] = $session_id;


            //For duplicate products
            $count_duplicateProducts = Cart::where([
                'id' => $inputToCart['product_id'],
                // Add if products details are available
            ])->count();

            if ($count_duplicateProducts > 0) {
                return back()->with('message', 'Product is already added!!');
            } else {
                //Cart added
                Cart::create($inputToCart);
                return back()->with('message', 'Product added to card');
            }
        } else {
            return back()->with('message', 'Stock is not available');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
