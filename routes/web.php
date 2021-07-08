<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeModelController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryproductsController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\BlogModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', [HomeModelController::class,"index"]);
Route::any('/category-ajax/', [HomeModelController::class,"cat_dynamic"]);
Route::any('/mixed-ajax/', [HomeModelController::class,"mixed"]);
Route::any('/about-us/', [HomeModelController::class,"about_us"]);
Route::any('/contact-us/', [HomeModelController::class,"contact_us"]);
Route::any('/terms-and-condition/', [HomeModelController::class,"terms"]);
Route::any('/privacy-policy/', [HomeModelController::class,"policy"]);
Route::any('/faq/', [FaqController::class,"index"]);
Route::any('/modal/{id}', [ProductModelController::class,"index"]);
Route::any('/categories/{slug}', [CategoryproductsController::class,"index"]);
Route::any('/shop/', [CategoryproductsController::class,"shop"]);
Route::any('/sub-categories/{slug}', [CategoryproductsController::class,"sub_cat"]);
Route::any('/product-details/{slug}', [ProductModelController::class,"details"]);
Route::any('/cart/', [ProductModelController::class,"cart"]);
Route::any('/checkout/', [ProductModelController::class,"checkout"]);
Route::any('/wishlist/', [ProductModelController::class,"wishlist"]);
Route::any('/order-complete/{id}', [ProductModelController::class,"order_complete"]);
Route::any('/pass-cart/', [ProductModelController::class,"passcart"]);
Route::any('/blog/', [BlogModelController::class,"index"]);
Route::any('/blog-details/{slug}', [BlogModelController::class,"details"]);
Route::any('/home', [ImageUploadController::class,"home"]);
Route::any('/uploadImage', [ImageUploadController::class,"uploadImages"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('Auth')->group(function () {
  Route::get('/login',[App\Http\Controllers\Auth\LoginController::class,'show_login_form'])->name('login');
  Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'get_registered'])->name('register');
});


