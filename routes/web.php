<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);

//Halaman register
Route::get('/register', [RegisterController::class, "index"])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::middleware('auth')->group(function () {
  // dashboard product
  Route::get('/dashboard', [HomeController::class, "index"])->name("home");
  Route::get('/dashboard/product/{id}', [HomeController::class, "show"])->name("product");

  Route::get('/cart', [CartController::class, "index"])->name('cart');
  Route::post('/cart', [CartController::class, "addCart"])->name("add-cart");
  Route::delete('/cart/{id}', [CartController::class, "destroy"])->name("remove-cart");

  Route::post('/checkout/{id}', [CartController::class, "proces"])->name('checkout-proces');
  Route::get('/checkout/{id}', [CartController::class, "checkout"])->name('checkout');
  Route::get('/checkout/success/{id}', [CartController::class, "success"])->name('checkout-succes');
});
