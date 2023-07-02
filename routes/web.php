<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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
//customer    
    // Home
    Route::get('/home', [ClientController::class, 'indexHome']);
    // Products
    Route::get('/products', [ClientController::class, 'indexProducts']);
    Route::get('/products/{slug}', [ClientController::class, 'showProduct'])->name('showProductsClient');
    Route::get('/categories/{slug}', [ClientController::class, 'indexProductsByCat']);
    //Offers
    Route::get('/offers', [ClientController::class, 'indexOffers']);
    //Testimonials
    Route::get('/testimonials', [ClientController::class, 'indexTestimonials']);
    //Medias
    Route::get('/media', [ClientController::class, 'indexArticles']);
    Route::get('/media/{slug}', [ClientController::class, 'showArticle']);
    //Order
    Route::get('/order', [ClientController::class, 'order']);

//admin
    Route::get('/admin/products', [ProductController::class, 'index'])->name('indexProducts');
    Route::get('/admin/products/add', [ProductController::class, 'create']);
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('storeProducts');
    Route::get('/admin/products/show/{slug}', [ProductController::class, 'show'])->name('showProducts');
    Route::get('/admin/products/edit/{slug}', [ProductController::class, 'edit']);
    Route::patch('/admin/products/update/{id_product}', [ProductController::class, 'update'])->name('updateProducts');
    Route::get('/admin/products/delete/{slug}', [ProductController::class, 'delete'])->name('deleteProducts');



});


