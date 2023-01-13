<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(App\Http\Controllers\MainController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::group(['middleware'=>['auth']], function(){
        Route::get('/cart', 'cart')->name('cart');
        Route::group(['prefix'=>'product'], function(){
            Route::get('/product-single/{id}', 'single')->name('product.single');
            Route::post('/add-to-cart/{id}', 'addToCart')->name('add.to.cart');
            Route::patch('update-cart', 'update')->name('update.cart');
            Route::delete('delete-cart', 'destroy')->name('cart.delete');
        });
    });

    Route::any('/shop', 'shop')->name('shop');
    Route::get('/category', 'category')->name('category');
    Route::any('/category/{id}', 'categoryById')->name('category.id');
    // Route::post('/category-fetch', 'fetch')->name('fetch');
    Route::any('/checkout', 'checkout')->name('checkout');
    Route::post('/checkout-post', 'postSave')->name('checkout.store');
    Route::post('/star-rating', 'ratingSave')->name('star.save');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact-store', 'contactSave')->name('contact.store');
});
Route::get('/profile', [UserController::class, 'index'])->name('user.index');
Route::post('/profile', [UserController::class, 'update'])->name('user.update');
// Route::get('/blogs/{id}',BlogController::class, 'getById')->name('byID');
Route::resource('blogs', BlogController::class);
