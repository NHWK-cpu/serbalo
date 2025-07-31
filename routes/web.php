<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

Route::get('/guide', function () {
    return view('welcome');
});

Route::get('/', 
    fn() => view('home', ['categories' => Category::all(), 'products' => Product::all()])
);

Route::get('/item/{product}',
    fn(Product $product) => view('item', ['product_selected' => $product])
);

Route::get('/login', [LoginController::class, 'show_login']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'show_register']);
Route::post('/register', [LoginController::class, 'register']);

// Route::post('/order', function (Product $product) {
    //     return view('order', ['order_product' => $product]);
// });

Route::get('/order-status', [OrderController::class, 'order_status']);
Route::post('/item/order', [OrderController::class, 'add_order']);
Route::post('/item/attempt-order', [OrderController::class, 'order']);

Route::post('/item/add-to-cart', [CartController::class, 'store']);
Route::get('/cart', [CartController::class, 'show_cart']);
Route::get('/delete-cart-item/{id}', [CartController::class, 'delete_item']);
Route::post('/order-cart', [OrderController::class, 'cart_order']);
Route::post('/attempt-order-cart', [OrderController::class, 'cart_checkout']);