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
            return redirect()->route('home')->with('Success', 'Welcome Admin!');
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

    // Paginate with 5 items per page and keep search query across pages
    $products = $query->orderBy('created_at', 'desc')->paginate(5)->appends($request->all());

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
            // qty now represents Lastname
            'qty' => 'required|string',
            // price now represents Age
            'price' => 'required|integer',
            // description now represents Address
            'description' => 'nullable|string'
        ]);

        Products::create($data);

        return redirect(route('home'))->with('Success', 'Product Created');
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
        return redirect(route('home'))->with('Success', 'Product Updated');
    }

    // 📌 DESTROY product

    public function destroy(Products $product){
        $product->delete();
         return redirect(route('home'))->with('Success', 'Product Deleted');
    }

    public function home(Request $request)
    {
        $perPage = (int) $request->input('per_page', 10);
        if ($perPage <= 0) { $perPage = 10; }
        if ($perPage > 100) { $perPage = 100; }
        $products = \App\Models\Products::orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends($request->all());
        $totalResidents = Products::count();
        return view('products.home', compact('products', 'totalResidents'));
    }


}
