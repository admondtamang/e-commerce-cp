<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StoreLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:store', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.loginStore');
    }


    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('store')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('store.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('store')->logout();
        return redirect('/');
    }
}
