<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Produit;

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

Route::get('/users', [UserController::class, "index"]);

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/register', [UserController::class, "store"] );
Route::post('/form-login', [UserController::class, "login"]);
Route::delete('/delete/{id}',[UserController::class, "destroy"])->name('delete_user');
Route::put('/update_role/{id}', [UserController::class, "update_role"])->name('update_user_role');
Route::put('/update_user/{id}', [UserController::class, "update"]);

Route::get('/products', [ProduitController::class, "index"]);
Route::post('/addProducts', [ProduitController::class, "store"]);