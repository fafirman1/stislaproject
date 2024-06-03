<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web". Buatlah sesuatu yang hebat!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function(){
        return view('pages.dashboard');
    }) ->name('home');

    Route::resource('user', UserController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::resource('order', OrderController::class);
    Route::get('/penjualan', [OrderController::class, 'index'])->name('penjualan.index');
    Route::get('/orders/print-pdf', [OrderController::class, 'printPDF'])->name('orders.printPDF');
});

/*
Route::get('/register', function () {
    return view('pages.auth.auth-register');
});
*/
