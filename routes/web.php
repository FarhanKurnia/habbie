<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductClientController;
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
Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/product/{slug}', [ProductClientController::class, 'show'])->name('show');

