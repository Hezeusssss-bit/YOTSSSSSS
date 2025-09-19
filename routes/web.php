<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('authCheck')->group(function () {
    // Resource routes for products with product.* names (for compatibility)
    Route::resource('products', App\Http\Controllers\ProductController::class)->names([
        'index' => 'product.index',
        'create' => 'product.create',
        'store' => 'product.store',
        'show' => 'product.show',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'destroy' => 'product.destroy',
    ]);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return redirect()->route('login'); // redirect root to login page
});


// Login routes
Route::get('/login', [ProductController::class, 'login'])->name('login');
Route::post('/login', [ProductController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [ProductController::class, 'logout'])->name('logout');


