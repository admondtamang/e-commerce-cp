<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Product;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == "store" && Auth::guard($guard)->check()) {

            return redirect('/store/store');
        }
        if (Auth::guard($guard)->check()) {
            $products = Product::all();
            return view('store/store')->with('products', $products);
            // return redirect('/home');
        }

        return $next($request);
    }
}
