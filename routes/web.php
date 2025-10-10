<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    // Resource routes for residents with resident.* names
    Route::resource('residents', App\Http\Controllers\ProductController::class)->names([
        'index' => 'resident.index',
        'create' => 'resident.create',
        'store' => 'resident.store',
        'show' => 'resident.show',
        'edit' => 'resident.edit',
        'update' => 'resident.update',
        'destroy' => 'resident.destroy',
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

Route::get('/residents', [ProductController::class, 'index'])->name('resident.index');
Route::get('/residents/create', [ProductController::class, 'create'])->name('resident.create');
Route::post('/residents', [ProductController::class, 'store'])->name('resident.store');
Route::get('/residents/{resident}', [ProductController::class, 'show'])->name('resident.show');
Route::get('/residents/{resident}/edit', [ProductController::class, 'edit'])->name('resident.edit');
Route::put('/residents/{resident}', [ProductController::class, 'update'])->name('resident.update');
Route::delete('/residents/{resident}', [ProductController::class, 'destroy'])->name('resident.destroy');

Route::get('/home', [ProductController::class, 'home'])->name('home');
Route::get('/facilities', [ProductController::class, 'facilities'])->name('facilities');
Route::get('/facilities/community-center', [ProductController::class, 'communityCenter'])->name('community');
Route::get('/facilities/health-center', [ProductController::class, 'healthCenter'])->name('health');
Route::get('/facilities/emergency-shelter', [ProductController::class, 'emergencyShelter'])->name('shelter');
Route::get('/school', [ProductController::class, 'school'])->name('school');
Route::get('/try-all', [ProductController::class, 'tryAll'])->name('tryall');
Route::post('/send-evacuation-sms', [App\Http\Controllers\SmsController::class, 'sendEvacuationAlert'])->name('send.evacuation.sms');
