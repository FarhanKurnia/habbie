<?php
use App\Http\Controllers\ClientController;
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

Route::prefix('test')->group(function () {
    // Home
    Route::get('/home', [ClientController::class, 'indexHome']);
    // Products
    Route::get('/products', [ClientController::class, 'indexProducts']);
    Route::get('/products/{slug}', [ClientController::class, 'showProduct']);
    Route::get('/categories/{slug}', [ClientController::class, 'indexProductsByCat']);
    //Offers
    Route::get('/offers', [ClientController::class, 'indexOffers']);
    //Testimonials
    Route::get('/testimonials', [ClientController::class, 'indexTestimonials']);
    //Medias
    Route::get('/media', [ClientController::class, 'indexArticles']);
    Route::get('/media/{slug}', [ClientController::class, 'showArticle']);
});


