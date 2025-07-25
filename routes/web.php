<?php

use App\Http\Controllers\LoginController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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