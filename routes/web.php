<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscountController;
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
//general (not login)
    // Home
    Route::get('/home', [ClientController::class, 'indexHome'])->name('home');
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

//customer (login role: customer n admin)
    //Order
    Route::middleware(['auth','verified','customer'])->group(function () {
        Route::get('/order', [ClientController::class, 'order']);
    });
    

//admin (login role: admin)
    Route::middleware(['auth','verified', 'admin'])->group(function () {
        // Dashboard
        Route::get('/admin/dashboard', function () {
            return view('test.admin.dashboard.dashboard-admin');
        })->name('dashboard');

        //Products
        Route::get('/admin/products', [ProductController::class, 'index'])->name('indexProducts');
        Route::get('/admin/products/add', [ProductController::class, 'create'])->name('createProducts');
        Route::post('/admin/products/store', [ProductController::class, 'store'])->name('storeProducts');
        Route::get('/admin/products/show/{slug}', [ProductController::class, 'show'])->name('showProducts');
        Route::get('/admin/products/edit/{slug}', [ProductController::class, 'edit'])->name('editProducts');
        Route::patch('/admin/products/update/{slug}', [ProductController::class, 'update'])->name('updateProducts');
        Route::get('/admin/products/delete/{slug}', [ProductController::class, 'delete'])->name('deleteProducts');

        //Categories Products
        Route::get('/admin/categories', [ProductCategoryController::class, 'index'])->name('indexCategories');
        Route::get('/admin/categories/add', [ProductCategoryController::class, 'create'])->name('createCategories');
        Route::post('/admin/categories/store', [ProductCategoryController::class, 'store'])->name('storeCategories');
        Route::get('/admin/categories/show/{slug}', [ProductCategoryController::class, 'show'])->name('showCategories');
        Route::get('/admin/categories/edit/{slug}', [ProductCategoryController::class, 'edit'])->name('editCategories');
        Route::patch('/admin/categories/update/{slug}', [ProductCategoryController::class, 'update'])->name('updateCategories');
        Route::get('/admin/categories/delete/{slug}', [ProductCategoryController::class, 'delete'])->name('deleteCategories');

        //Offers
        Route::get('/admin/offers', [OfferController::class, 'index'])->name('indexOffers');
        Route::get('/admin/offers/add', [OfferController::class, 'create'])->name('createOffers');
        Route::post('/admin/offers/store', [OfferController::class, 'store'])->name('storeOffers');
        Route::get('/admin/offers/show/{slug}', [OfferController::class, 'show'])->name('showOffers');
        Route::get('/admin/offers/edit/{slug}', [OfferController::class, 'edit'])->name('editOffers');
        Route::patch('/admin/offers/update/{slug}', [OfferController::class, 'update'])->name('updateOffers');
        Route::get('/admin/offers/delete/{slug}', [OfferController::class, 'delete'])->name('deleteOffers');

        //Articles
        Route::get('/admin/articles', [ArticleController::class, 'index'])->name('indexArticles');
        Route::get('/admin/articles/add', [ArticleController::class, 'create'])->name('createArticles');
        Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('storeArticles');
        Route::get('/admin/articles/show/{slug}', [ArticleController::class, 'show'])->name('showArticles');
        Route::get('/admin/articles/edit/{slug}', [ArticleController::class, 'edit'])->name('editArticles');
        Route::patch('/admin/articles/update/{slug}', [ArticleController::class, 'update'])->name('updateArticles');
        Route::get('/admin/articles/delete/{slug}', [ArticleController::class, 'delete'])->name('deleteArticles');

        //Discounts
        Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('indexDiscounts');
        Route::get('/admin/discounts/add', [DiscountController::class, 'create'])->name('createDiscounts');
        Route::post('/admin/discounts/store', [DiscountController::class, 'store'])->name('storeDiscounts');
        Route::get('/admin/discounts/show/{slug}', [DiscountController::class, 'show'])->name('showDiscounts');
        Route::get('/admin/discounts/edit/{slug}', [DiscountController::class, 'edit'])->name('editDiscounts');
        Route::patch('/admin/discounts/update/{slug}', [DiscountController::class, 'update'])->name('updateDiscounts');
        Route::get('/admin/discounts/delete/{slug}', [DiscountController::class, 'delete'])->name('deleteDiscounts');
    });
// Auth
    Route::get('/verification/{token}',[AuthController::class,'verification'])->name('verification');
    Route::get('/register',[AuthController::class,'register'])->name('register')->middleware('guest');
    Route::post('/register',[AuthController::class,'registerProcess'])->name('registerProcess');
    Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
    Route::post('/login',[AuthController::class,'authenticate'])->name('authenticate');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

//Debug
    Route::get('/profile',[AuthController::class,'profile'])->name('profile');


});