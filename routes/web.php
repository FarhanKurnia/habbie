<?php
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BodyRecommendationController;
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
use App\Http\Controllers\ReviewController;
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

// Public Routes
Route::get('/', [ClientController::class, 'indexHome'])->name('home'); //home
Route::get('/about', function () {
    return view('pages.public.about');
}); //about
Route::get('/offers', [ClientController::class, 'indexOffers']); //offers
Route::get('/products', [ClientController::class, 'indexProducts']); //products
Route::get('/products/{slug}', [ClientController::class, 'showProduct'])->name('products.show'); //show product
Route::get('products/categories/{slug}', [ClientController::class, 'indexProductsByCat']);
Route::get('cart', function (){
    return view('pages.public.cart');
}); //cart
Route::get('testimonials', [ClientController::class, 'indexTestimonials']); //testimonials
Route::get('membership',[ResellerController::class, 'membership']); //membership
Route::get('membership/join', function (){
    return view('pages.public.register-membership');
}); //join membership
Route::get('/media', [ClientController::class, 'indexArticles']); //articles
Route::get('/media/{slug}', [ClientController::class, 'showArticle'])->name('showArticleClient'); //show article
Route::get('/careers', [ClientController::class, 'indexCareers'])->name('indexCareerClient'); //careers
Route::get('/careers/{slug}', [ClientController::class, 'showCareer'])->name('showCareerClient'); //show career
Route::post('/subscribe',[ClientController::class,'subscribe'])->name('subscribe');
Route::post('/unsubscribe', [ClientController::class, 'unsubscribe'])->name('unsubscribe');
// Route::get('/subscribe', function () { return view('test.customer.subscriber.subscribe-client');});
Route::get('/unsubscribe', function () { 
    return view('pages.public.unsubscribe-form');
});





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


// Customer Routes
Route::middleware(['auth','verified','customer'])->group(function () {
    Route::get('payment/{slug}', [TestPaymentController::class, 'show']);
    Route::get('checkout', [CheckoutController::class, 'show']);
    Route::get('invoice/{invoice}',[ClientController::class,'showInvoiceClient'])->name('showInvoiceClient');
    Route::get('invoice',[ClientController::class,'indexInvoiceClient']);

    Route::get('profile',[UserController::class,'profile'])->name('profile');
    Route::patch('update-profile',[UserController::class,'updateProfile'])->name('updateProfileClient');

});

// Admin Routes
Route::middleware(['auth','verified', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class,'index'])->name('dashboard');
        
        // Body Recommendations
        Route::prefix('recommendations')->group(function () {
            Route::get('/', [BodyRecommendationController::class, 'index'])->name('indexRecommendations');
            Route::get('/add', [BodyRecommendationController::class, 'create'])->name('createRecommendations');
            Route::get('/edit/{slug}', [BodyRecommendationController::class, 'edit'])->name('editRecommendations');
            Route::post('/store', [BodyRecommendationController::class, 'store'])->name('storeRecommendations');
            Route::patch('/update/{slug}', [BodyRecommendationController::class, 'update'])->name('updateRecommendations');
            Route::get('/delete/{slug}', [BodyRecommendationController::class, 'delete'])->name('deleteRecommendations');
        });
        
        // Products
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('indexProducts');
            Route::get('/add', [ProductController::class, 'create'])->name('createProducts');
            Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('editProducts');
            Route::post('/store', [ProductController::class, 'store'])->name('storeProducts');
            Route::patch('/update/{slug}', [ProductController::class, 'update'])->name('updateProducts');
            Route::get('/delete/{slug}', [ProductController::class, 'delete'])->name('deleteProducts');
            route::get('/active/{slug}',[ProductController::class, 'active'])->name('active');
            route::get('/non-active/{slug}',[ProductController::class, 'nonactive'])->name('nonactive');
        
        

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

        //Orders
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('indexOrders');
            Route::get('/edit/{invoice}', [OrderController::class, 'editOrders'])->name('editOrders');
            Route::patch('/update/{invoice}', [OrderController::class, 'updateOrders'])->name('updateOrders');
            // Route::get('/{status}', [OrderController::class, 'indexStatusOrders'])->name('indexStatusOrders');
            // Route::get('/show/{invoice}', [OrderController::class, 'show'])->name('showOrders');
        });

        //Reviews
        Route::prefix('reviews')->group(function () {        
            Route::get('/',[ReviewController::class,'index'])->name('indexReviews');
            Route::get('/add', [ReviewController::class, 'create'])->name('createReviews');
            Route::post('/store', [ReviewController::class, 'store'])->name('storeReviews');        
            Route::get('/edit/{id_review}',[ReviewController::class,'edit'])->name('editReviews');
            Route::patch('/update/{id_review}',[ReviewController::class,'update'])->name('updateReviews');
            Route::get('/delete/{id_review}', [ReviewController::class, 'delete'])->name('deleteReviews');
        });

        //Resellers
        Route::prefix('resellers')->group(function () {
            Route::get('/', [ResellerController::class, 'index'])->name('indexResellers');
            Route::get('/change-status/{reseller_id}', [ResellerController::class, 'changeStatus'])->name('changeStatusResellers');
            Route::get('/edit/{reseller_id}', [ResellerController::class, 'edit'])->name('editResellers');
            Route::patch('/update/{reseller_id}', [ResellerController::class, 'update'])->name('updateResellers');
        });

        // Term n Condition Reseller Membership
        // Route::get('/term/{slug}', [ResellerController::class, 'getTermReseller'])->name('getTermReseller'); // edit
        Route::get('/term-reseller', [ResellerController::class, 'getTermReseller'])->name('termReseller'); // edit
        Route::patch('/term-reseller', [ResellerController::class, 'setTermReseller'])->name('setTermReseller'); //update

        //Users
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('indexUsers');
            Route::get('/show/{customer_id}', [UserController::class, 'show'])->name('showUsers');
            Route::get('/profile', [UserController::class, 'profile'])->name('profileAdmin');
            Route::patch('/update', [UserController::class, 'updateProfile'])->name('updateProfile');
        
        //Subcribe
        Route::get('/indexSubscribe',[ClientController::class,'indexSubscriber'])->name('indexSubscriber');
        });


//Debug
    Route::get('/order',[OrderController::class,'store'])->name('order');
    // Route::get('/order/{invoice}',[OrderController::class,'getOrder'])->name('getOrder');
    // Route::get('/invoice/{invoice}',[ClientController::class,'showInvoiceClient'])->name('showInvoiceClient');
    // Route::get('/invoice',[ClientController::class,'indexInvoiceClient']);
    Route::get('/reseller',[ClientController::class,'testReseller'])->name('testReseller');
    Route::post('/joinReseller',[ClientController::class,'joinReseller'])->name('joinReseller');
    
    
    // Route::get('/subscribe', function () { return view('test.customer.subscriber.subscribe-client');});
    

    });
});


// ========= Debug New Feature ==================

// Route::get('/term-reseller/{slug}', [ResellerController::class, 'getTermReseller'])->name('getTermReseller');
// Route::patch('/term-reseller/{slug}', [ResellerController::class, 'setTermReseller'])->name('setTermReseller');









// ========= Gudang ==================
// Route::get('membership', function (){
//     return view('pages.public.membership');
// }); //membership

// Route::get('/term-reseller', function () {
//     return view('test.admin.reseller.set-term-reseller-admin');
// });


// Route::get('/unsubscribe', function () {
//     return view('pages.public.unsubscribe');
// });


// // START TESTING PAGE HERE
// Route::prefix('test')->group(function () {



// //admin (login role: admin)
//     Route::middleware(['auth','verified', 'admin'])->group(function () {
  
//         //Users
//         Route::get('/admin/users', [UserController::class, 'index'])->name('indexUsers');
//         Route::get('/admin/users/show/{customer_id}', [UserController::class, 'show'])->name('showUsers');


// });
