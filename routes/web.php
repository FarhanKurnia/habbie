<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\OfferClientController;
use App\Http\Controllers\TestimonialClientController;
use App\Http\Controllers\ArticleClientController;
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

// Route Customer
//home
Route::get('/test/home', [HomeController::class, 'index']);

// Products Route [Customer]
//get all products
Route::get('/test/products', [ProductClientController::class, 'allProduct']);
//get one product
Route::get('/test/products/{slug}', [ProductClientController::class, 'show']);
//get one categories product / index
Route::get('/test/products/categories/{slug}', [ProductClientController::class, 'index']);

// Offers Route [Customer]
//Offers
Route::get('/test/offers', [OfferClientController::class, 'index']);

// Testimonials Route [Customer]
//Testimonial
Route::get('/test/testimonials', [TestimonialClientController::class, 'index']);

// Medias Route [Customer]
//Testimonial
Route::get('/test/media', [ArticleClientController::class, 'index']);
Route::get('/test/media/{slug}', [ArticleClientController::class, 'show']);




