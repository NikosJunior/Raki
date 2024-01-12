<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',function() {
    return view('acceuil');
})->name('acceuil');

Route::get('/apropos', function() {
    return view('apropos');
})->name('apropos');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/boutique', function() {
    return view('boutique');
})->name('boutique');

Route::get('/blog', function() {
    return view('blog');
})->name('blog');

Route::get('/cart', function() {
    return view('cart');
})->name('cart');

Route::get('/detail_product', function() {
    return view('detail_product');
})->name('detail_product');

Route::get('/detail_blog', function() {
    return view('detail_blog');
})->name('detail_blog');

Route::get('/checkout', function() {
    return view('checkout');
})->name('checkout');

Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
});

Route::get('/orders', function() {
    return view('dashboard.orders');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/users', function() {
    return view('dashboard.users');
});

Route::get('/signup', function() {
    return view('signup');
});
