<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    function index()
    {
        return view('profile.index');
    }

    function editProfile($id)
    {

        $user = User::find($id);
        if (!$user)
            return redirect()->back();

        return view('profile.editProfile', [
            'user' => $user
        ]);
    }

    public function show()
    { }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:150',
            'email' => 'nullable|email',
            'gender' => 'required',
            'phone' => 'max:20|min:5',
            'password' => 'required|min:6'
        ]);

        $user = $request->all();
        DB::table('users')->where('id', $id)->update([
            'name' => $user['name'],
            'email' => $user['email'],
            'gender' => $user['gender'],
            'phone' => $user['phone'],
            'password' => $user['password'],
        ]);
        return back()->with('message', 'Update Profile already!');
    }
}
