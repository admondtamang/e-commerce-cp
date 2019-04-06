<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Shipping;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart::where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data) {
            $total_price += $cart_data->price * $cart_data->quantity;
        }
        // $shipping_address = Shipping::where('users_id', Auth::id())->first();
        // return view('frontEnd.checkout', compact('shipping_address', 'cart_datas', 'total_price'));
        return view('frontEnd.checkout', compact('cart_datas', 'total_price'));
    }

    public function store(Request $request)
    {
        $input_data = $request->all();
        $input_data['user_id'] = Auth()->user()->id;

        //for product id
        $session_id = Session::get('session_id');
        $cart_datas = Cart::where('session_id', $session_id)->get();
        // dd($cart_datas);
        foreach ($cart_datas as $data) {
            $input_data['order_date'] = now();
            // dd($cart_datas)  ;
            $input_data['product_id'] = $data['product_id'];
            $input_data['status'] = 0;
            $input_data['payment'] = 'cod';

            $input_data['product_quantity'] = $data['quantity'];
            Order::create($input_data);
        }
        // if ($payment_method == "COD") {
        //     return redirect('/cod');
        // } else {
        //     return redirect('/paypal');
        // }
        return view('frontEnd.orderPlaced');
    }
}
