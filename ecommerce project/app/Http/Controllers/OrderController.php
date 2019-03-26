<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $input_data = $request->all();
        $payment_method = $input_data['payment_method'];
        Orders_model::create($input_data);
        // if ($payment_method == "COD") {
        //     return redirect('/cod');
        // } else {
        //     return redirect('/paypal');
        // }
    }
}
