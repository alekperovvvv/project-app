<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Models\Product;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
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

Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [ProductsController::class, 'create']);
});

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('products/{id}', function($id){
    return view('order',['product'=>Product::find($id)]);
});

Route::post ('/order', [ProductsController::class,'order']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/orderlist', [OrderController::class, 'index'])->name('orders.orderlist');
});