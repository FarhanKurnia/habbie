<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\OfferClientController;
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

// Route Customer
//home
Route::get('/home', [HomeController::class, 'index']);

// Products Route [Customer]
//get all products
Route::get('/products', [ProductClientController::class, 'allProduct']);
//get one product
Route::get('/products/{slug}', [ProductClientController::class, 'show']);
//get one categories product / index
Route::get('/products/categories/{slug}', [ProductClientController::class, 'index']);

// Offers Route [Customer]
//Offers
Route::get('/offers', [OfferClientController::class, 'index']);




