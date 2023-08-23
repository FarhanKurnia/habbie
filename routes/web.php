<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\TestPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/', [ClientController::class, 'indexHome'])->name('home');

Route::get('/about', function () {
    return view('pages.public.about');
});

Route::get('/offers', [ClientController::class, 'indexOffers']);

Route::get('/products', [ClientController::class, 'indexProducts']);

Route::get('/products/{slug}', [ClientController::class, 'showProduct'])->name('products.show');

Route::get('products/categories/{slug}', [ClientController::class, 'indexProductsByCat']);

Route::get('cart', function (){
    return view('pages.public.cart');
});

Route::get('testimonials', [ClientController::class, 'indexTestimonials']);

Route::get('membership', function (){
    return view('pages.public.membership');
});

Route::get('membership/join', function (){
    return view('pages.public.register-membership');
});

Route::get('/media', [ClientController::class, 'indexArticles']);

Route::get('/media/{slug}', [ClientController::class, 'showArticle'])->name('showArticleClient');

Route::get('/careers', [ClientController::class, 'indexCareers'])->name('indexCareerClient');

Route::get('/careers/{slug}', [ClientController::class, 'showCareer'])->name('showCareerClient');


// Auth
Route::get('/verification/{token}',[AuthController::class,'verification'])->name('verification');
Route::get('/register',[AuthController::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class,'registerProcess'])->name('registerProcess');
Route::get('/request-otp',[AuthController::class,'requestOTP'])->name('requestOTP')->middleware('guest');;
Route::post('/request-otp',[AuthController::class,'requestOTPProcess'])->name('requestOTPProcess');
Route::get('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetPassword')->middleware('guest');;
Route::post('/forget-password',[AuthController::class,'forgetPasswordProcess'])->name('forgetPasswordProcess');
Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::middleware(['auth','verified','customer'])->group(function () {
    Route::get('payment/{slug}', [TestPaymentController::class, 'show']);
    Route::get('checkout', [CheckoutController::class, 'show']);
    Route::get('invoice/{invoice}',[ClientController::class,'showInvoiceClient'])->name('showInvoiceClient');
    Route::get('invoice',[ClientController::class,'indexInvoiceClient']);
});

// Admin
Route::middleware(['auth','verified', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Dsshboard
        Route::get('/', function(){
            return view('pages.admin.dashboard');
        })->name('dashboard');

        // Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('indexProducts');
            Route::get('/add', [ProductController::class, 'create'])->name('createProducts');
            Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('editProducts');
            Route::post('/store', [ProductController::class, 'store'])->name('storeProducts');
            Route::patch('/update/{slug}', [ProductController::class, 'update'])->name('updateProducts');
            Route::get('/delete/{slug}', [ProductController::class, 'delete'])->name('deleteProducts');

            // category
            Route::prefix('categories')->group(function () {
                Route::get('/', [ProductCategoryController::class, 'index'])->name('indexCategories');
                Route::get('/add', [ProductCategoryController::class, 'create'])->name('createCategories');
                Route::get('/edit/{slug}', [ProductCategoryController::class, 'edit'])->name('editCategories');
                Route::patch('/update/{slug}', [ProductCategoryController::class, 'update'])->name('updateCategories');
                Route::post('/store', [ProductCategoryController::class, 'store'])->name('storeCategories');
                Route::get('/delete/{slug}', [ProductCategoryController::class, 'delete'])->name('deleteCategories');
            });

            // discount
            Route::prefix('discounts')->group(function () {
                Route::get('/', [DiscountController::class, 'index'])->name('indexDiscounts');
                Route::get('/add', [DiscountController::class, 'create'])->name('createDiscounts');
                Route::post('/store', [DiscountController::class, 'store'])->name('storeDiscounts');
                Route::get('/edit/{slug}', [DiscountController::class, 'edit'])->name('editDiscounts');
                Route::patch('/update/{slug}', [DiscountController::class, 'update'])->name('updateDiscounts');
                Route::get('/delete/{slug}', [DiscountController::class, 'delete'])->name('deleteDiscounts');
            });
        });

        // Articles
        Route::prefix('articles')->group(function () {
            Route::get('/', [ArticleController::class, 'index'])->name('indexArticles');
            Route::get('/add', [ArticleController::class, 'create'])->name('createArticles');
            Route::post('/store', [ArticleController::class, 'store'])->name('storeArticles');
            Route::get('/edit/{slug}', [ArticleController::class, 'edit'])->name('editArticles');
            Route::patch('/update/{slug}', [ArticleController::class, 'update'])->name('updateArticles');
            Route::get('/delete/{slug}', [ArticleController::class, 'delete'])->name('deleteArticles');
            Route::post('/image-upload', [UploadController::class, 'storeImage'])->name('imageUpload');
            // Route::get('/show/{slug}', [ArticleController::class, 'show'])->name('showArticles');
        });

        // Careers
        Route::prefix('careers')->group(function () {
            Route::get('/', [CareerController::class, 'index'])->name('indexCareers');
            Route::get('/add', [CareerController::class, 'create'])->name('createCareers');
            Route::post('/store', [CareerController::class, 'store'])->name('storeCareers');
            Route::get('/edit/{slug}', [CareerController::class, 'edit'])->name('editCareers');
            Route::patch('/update/{slug}', [CareerController::class, 'update'])->name('updateCareers');
            Route::get('/delete/{slug}', [CareerController::class, 'delete'])->name('deleteCareers');
            // Route::get('/show/{slug}', [CareerController::class, 'show'])->name('showCareers');
        });

        // Offers
        Route::prefix('offers')->group(function () {
            Route::get('/', [OfferController::class, 'index'])->name('indexOffers');
            Route::get('/add', [OfferController::class, 'create'])->name('createOffers');
            Route::post('/store', [OfferController::class, 'store'])->name('storeOffers');
            Route::get('/edit/{slug}', [OfferController::class, 'edit'])->name('editOffers');
            Route::patch('/update/{slug}', [OfferController::class, 'update'])->name('updateOffers');
            Route::get('/delete/{slug}', [OfferController::class, 'delete'])->name('deleteOffers');
            // Route::get('/show/{slug}', [OfferController::class, 'show'])->name('showOffers');
        });

        //Testimonials
        Route::prefix('testimonials')->group(function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('indexTestimonials');
            Route::get('/add', [TestimonialController::class, 'create'])->name('createTestimonials');
            Route::post('/store', [TestimonialController::class, 'store'])->name('storeTestimonials');
            Route::get('/show/{slug}', [TestimonialController::class, 'show'])->name('showTestimonials');
            Route::get('/edit/{slug}', [TestimonialController::class, 'edit'])->name('editTestimonials');
            Route::patch('/update/{slug}', [TestimonialController::class, 'update'])->name('updateTestimonials');
            Route::get('/delete/{slug}', [TestimonialController::class, 'delete'])->name('deleteTestimonials');
        });

    });
});

Route::prefix('test')->group(function () {
    Route::get('/testimonials', [ClientController::class, 'indexTestimonials'])->name('indexTestimonialClient');
    //Medias
    Route::get('/media', [ClientController::class, 'indexArticles'])->name('indexArticleClient');
    Route::get('/media/{slug}', [ClientController::class, 'showArticle'])->name('showArticleClient');

    //Careers
    Route::get('/career', [ClientController::class, 'indexCareers'])->name('indexCareerClient');
    Route::get('/career/{slug}', [ClientController::class, 'showCareer'])->name('showCareerClient');

    //search
    Route::get('/search', [ClientController::class, 'search'])->name('search');


    

//admin (login role: admin)
    Route::middleware(['auth','verified', 'admin'])->group(function () {
        // Dashboard
        // Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard');

        //Products
        // Route::get('/admin/products', [ProductController::class, 'index'])->name('indexProducts');
        // Route::get('/admin/products/add', [ProductController::class, 'create'])->name('createProducts');
        // Route::post('/admin/products/store', [ProductController::class, 'store'])->name('storeProducts');
        // Route::get('/admin/products/show/{slug}', [ProductController::class, 'show'])->name('showProducts');
        // Route::get('/admin/products/edit/{slug}', [ProductController::class, 'edit'])->name('editProducts');
        // Route::patch('/admin/products/update/{slug}', [ProductController::class, 'update'])->name('updateProducts');
        // Route::get('/admin/products/delete/{slug}', [ProductController::class, 'delete'])->name('deleteProducts');

        //Categories Products
        // Route::get('/admin/categories', [ProductCategoryController::class, 'index'])->name('indexCategories');
        // Route::get('/admin/categories/add', [ProductCategoryController::class, 'create'])->name('createCategories');
        // Route::post('/admin/categories/store', [ProductCategoryController::class, 'store'])->name('storeCategories');
        // Route::get('/admin/categories/show/{slug}', [ProductCategoryController::class, 'show'])->name('showCategories');
        // Route::get('/admin/categories/edit/{slug}', [ProductCategoryController::class, 'edit'])->name('editCategories');
        // Route::patch('/admin/categories/update/{slug}', [ProductCategoryController::class, 'update'])->name('updateCategories');
        // Route::get('/admin/categories/delete/{slug}', [ProductCategoryController::class, 'delete'])->name('deleteCategories');

        //Offers
        // Route::get('/admin/offers', [OfferController::class, 'index'])->name('indexOffers');
        // Route::get('/admin/offers/add', [OfferController::class, 'create'])->name('createOffers');
        // Route::post('/admin/offers/store', [OfferController::class, 'store'])->name('storeOffers');
        // Route::get('/admin/offers/show/{slug}', [OfferController::class, 'show'])->name('showOffers');
        // Route::get('/admin/offers/edit/{slug}', [OfferController::class, 'edit'])->name('editOffers');
        // Route::patch('/admin/offers/update/{slug}', [OfferController::class, 'update'])->name('updateOffers');
        // Route::get('/admin/offers/delete/{slug}', [OfferController::class, 'delete'])->name('deleteOffers');

        //Articles
        // Route::get('/admin/articles', [ArticleController::class, 'index'])->name('indexArticles');
        // Route::get('/admin/articles/add', [ArticleController::class, 'create'])->name('createArticles');
        // Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('storeArticles');
        // Route::get('/admin/articles/show/{slug}', [ArticleController::class, 'show'])->name('showArticles');
        // Route::get('/admin/articles/edit/{slug}', [ArticleController::class, 'edit'])->name('editArticles');
        // Route::patch('/admin/articles/update/{slug}', [ArticleController::class, 'update'])->name('updateArticles');
        // Route::get('/admin/articles/delete/{slug}', [ArticleController::class, 'delete'])->name('deleteArticles');

        //Careers
        // Route::get('/admin/careers', [CareerController::class, 'index'])->name('indexCareers');
        // Route::get('/admin/careers/add', [CareerController::class, 'create'])->name('createCareers');
        // Route::post('/admin/careers/store', [CareerController::class, 'store'])->name('storeCareers');
        // Route::get('/admin/careers/show/{slug}', [CareerController::class, 'show'])->name('showCareers');
        // Route::get('/admin/careers/edit/{slug}', [CareerController::class, 'edit'])->name('editCareers');
        // Route::patch('/admin/careers/update/{slug}', [CareerController::class, 'update'])->name('updateCareers');
        // Route::get('/admin/careers/delete/{slug}', [CareerController::class, 'delete'])->name('deleteCareers');


        //Discounts
        // Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('indexDiscounts');
        // Route::get('/admin/discounts/add', [DiscountController::class, 'create'])->name('createDiscounts');
        // Route::post('/admin/discounts/store', [DiscountController::class, 'store'])->name('storeDiscounts');
        // Route::get('/admin/discounts/show/{slug}', [DiscountController::class, 'show'])->name('showDiscounts');
        // Route::get('/admin/discounts/edit/{slug}', [DiscountController::class, 'edit'])->name('editDiscounts');
        // Route::patch('/admin/discounts/update/{slug}', [DiscountController::class, 'update'])->name('updateDiscounts');
        // Route::get('/admin/discounts/delete/{slug}', [DiscountController::class, 'delete'])->name('deleteDiscounts');

        // //Testimonials
        // Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('indexTestimonials');
        // Route::get('/admin/testimonials/add', [TestimonialController::class, 'create'])->name('createTestimonials');
        // Route::post('/admin/testimonials/store', [TestimonialController::class, 'store'])->name('storeTestimonials');
        // Route::get('/admin/testimonials/show/{slug}', [TestimonialController::class, 'show'])->name('showTestimonials');
        // Route::get('/admin/testimonials/edit/{slug}', [TestimonialController::class, 'edit'])->name('editTestimonials');
        // Route::patch('/admin/testimonials/update/{slug}', [TestimonialController::class, 'update'])->name('updateTestimonials');
        // Route::get('/admin/testimonials/delete/{slug}', [TestimonialController::class, 'delete'])->name('deleteTestimonials');
        
        //Users
        Route::get('/admin/users', [UserController::class, 'index'])->name('indexUsers');
        Route::get('/admin/users/show/{customer_id}', [UserController::class, 'show'])->name('showUsers');

        //Orders
        Route::get('/admin/orders', [OrderController::class, 'index'])->name('indexOrders');
        Route::get('/admin/orders/{status}', [OrderController::class, 'indexStatusOrders'])->name('indexStatusOrders');
        Route::get('/admin/orders/show/{invoice}', [OrderController::class, 'show'])->name('showOrders');
        Route::get('/admin/orders/edit/{invoice}', [OrderController::class, 'editOrders'])->name('editOrders');
        Route::patch('/admin/orders/update/{invoice}', [OrderController::class, 'updateOrders'])->name('updateOrders');
        // Route::get('/admin/orders/edit/{invoice}', [OrderController::class, 'editResi'])->name('editResi');
        // Route::patch('/admin/orders/process/{invoice}', [OrderController::class, 'processOrder'])->name('processOrder');
        // Route::get('/admin/orders/cancel/{invoice}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');

        //Resellers
        Route::get('/admin/resellers', [ResellerController::class, 'index'])->name('indexResellers');
        Route::get('/admin/resellers/update/{reseller_id}', [ResellerController::class, 'update'])->name('updateResellers');

    });

//Debug
    Route::get('/profile',[AuthController::class,'profile'])->name('profile');
    Route::get('/order',[OrderController::class,'store'])->name('order');
    // Route::get('/order/{invoice}',[OrderController::class,'getOrder'])->name('getOrder');
    // Route::get('/invoice/{invoice}',[ClientController::class,'showInvoiceClient'])->name('showInvoiceClient');
    // Route::get('/invoice',[ClientController::class,'indexInvoiceClient']);
    Route::get('/reseller',[ClientController::class,'testReseller'])->name('testReseller');
    Route::post('/joinReseller',[ClientController::class,'joinReseller'])->name('joinReseller');
});