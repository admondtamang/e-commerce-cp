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
    {
        $this->middleware('auth:store');
    }

    public function index()
    {
        return view('store.store');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_name' => 'required|min:5',
            'p_code' => 'required',
            'p_color' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $fileName = time() . '-' . str_slug($formInput['p_name'], "-") . '.' . $image->getClientOriginalExtension();
                $large_image_path = public_path('products/large/' . $fileName);
                $medium_image_path = public_path('products/medium/' . $fileName);
                $small_image_path = public_path('products/small/' . $fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600, 600)->save($medium_image_path);
                Image::make($image)->resize(300, 300)->save($small_image_path);
                $formInput['image'] = $fileName;
            }
        }
        Products_model::create($formInput);
        return redirect()->route('product.create')->with('message', 'Add Products Successfully!');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
