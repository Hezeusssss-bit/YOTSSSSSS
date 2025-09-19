<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;


class ProductController extends Controller
{

    public function loginPost(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 🔑 Dummy account
    $dummyEmail = 'kyle@kyle';
    $dummyPassword = 'kyle';

    if ($credentials['email'] === $dummyEmail && $credentials['password'] === $dummyPassword) {
        // Store session to keep user logged in
        session(['loggedIn' => true]);
        return redirect()->route('product.index')->with('Success', 'Welcome Admin!');
    }

    return back()->withErrors([
        'email' => 'Invalid login credentials.',
    ]);
}


public function logout()
{
    session()->forget('loggedIn');
    return redirect()->route('login')->with('Success', 'Logged out successfully.');
}


public function login()
{
    return view('products.login');
}

    public function index(){
         $products = Products::all();
         return view('products.index', ['products' => $products]);
    }

    public function create(){
         return view('products.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => "nullable"
        ]);

        $newProduct = products::create($data);

        return redirect(route('product.index'));
    }

    public function edit(Products $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Products $product, Request $request){
            $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => "nullable"
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('Success', 'Product Updated');
    }

    public function destroy(Products $product){
        $product->delete();
         return redirect(route('product.index'))->with('Success', 'Product Deleted');
    }
    
}
    