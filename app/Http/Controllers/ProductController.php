<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    // 🔑 Login POST
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Dummy account
        $dummyEmail = 'kyle@kyle';
        $dummyPassword = 'kyle';

        if ($credentials['email'] === $dummyEmail && $credentials['password'] === $dummyPassword) {
            session(['loggedIn' => true]);
            return redirect()->route('product.index')->with('Success', 'Welcome Admin!');
        }

        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }

    // 🔑 Logout
    public function logout()
    {
        session()->forget('loggedIn');
        return redirect()->route('login')->with('Success', 'Logged out successfully.');
    }

    // 🔑 Login page
    public function login()
    {
        return view('products.login');
    }

    // 📌 INDEX with Search + Pagination
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Products::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Use paginate instead of all()
        $products = $query->paginate(5)->appends(['search' => $search]);

        return view('products.index', ['products' => $products]);
    }

    // 📌 CREATE page
    public function create()
    {
        return view('products.create');
    }

    // 📌 STORE new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => "nullable"
        ]);

        Products::create($data);

        return redirect(route('product.index'))->with('Success', 'Product Created');
    }

    // 📌 EDIT page
    public function edit(Products $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    // 📌 UPDATE product
    public function update(Products $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => "nullable"
        ]);

        $product->update($data);
        return redirect(route('product.index'))->with('Success', 'Product Updated');
    }

    // 📌 DESTROY product

    public function destroy(Products $product){
        $product->delete();
         return redirect(route('product.index'))->with('Success', 'Product Deleted');
    }


}
