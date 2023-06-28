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

Route::get('/', function () {
    return view('pages.public.home');
});

Route::get('/about', function () {
    return view('pages.public.about');
});

Route::get('/offers', function () {
    return view('pages.public.offers.index');
});

Route::get('/products', function () {
    return view('pages.public.products.index');
});

Route::get('/products/{slug}', function ($slug) {
    
    $data = [
        'slug' => $slug,
        'title' => 'Test Product'
    ];

    return view('pages.public.products.detail', ['data' => $data]);
});
