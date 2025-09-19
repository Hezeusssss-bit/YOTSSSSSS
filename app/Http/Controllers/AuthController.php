<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Start session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);

            return redirect()->route('product.index')
                ->with('Success', 'Welcome back, ' . $user->name . '!');
        }

        return back()->withErrors(['Invalid email or password']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // end session
        return redirect()->route('login')->with('Success', 'You have been logged out.');
    }
}
