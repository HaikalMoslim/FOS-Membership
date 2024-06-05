<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductOutletController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Frontend\SliderController;
use App\Http\Controllers\Frontend\ProfileController;

use App\Http\Controllers\BotManController;
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

Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

Route::get('product-list', [FrontendController::class,'productlistAjax']);
Route::post('searchproduct', [FrontendController::class,'searchProduct']);

Route::get('map', [FrontendController::class, 'showMap']);
Route::get('map/{name}', [FrontendController::class, 'viewmap']);

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Auth::routes();

Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::get('load-wishlist-count',[WishlistController::class,'wishlistcount']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteitem']);
Route::post('clearall-wishlist-item',[WishlistController::class,'clearitem']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class,'viewcart']);
    Route::get('checkout', [CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    Route::get('profile',[ProfileController::class,'profile']);
    Route::delete('delete-profile', [ProfileController::class, 'deleteProfile'])->name('delete.profile');
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('edit.profile');
    Route::put('update-profile', [ProfileController::class, 'updateProfile'])->name('update.profile');

    Route::get('point-history',[ProfileController::class,'pointHistory']);
    Route::get('voucher-history',[ProfileController::class,'voucher']);

    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);

    Route::post('add-rating',[RatingController::class,'add']);

    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'add']);
    Route::post('add-review',[ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview',[ReviewController::class, 'edit']);
    Route::put('update-review',[ReviewController::class, 'update']);

    Route::get('wishlist',[WishlistController::class,'index']);
});

 Route::middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/dashboard','App\Http\Controllers\Admin\FrontendController@index');

    Route::get('categories','App\Http\Controllers\Admin\CategoryController@index');
    Route::get('add-category','App\Http\Controllers\Admin\CategoryController@add');
    Route::post('insert-category','App\Http\Controllers\Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('orders',[OrderController::class,'index']);
    Route::get('admin/view-order/{id}',[OrderController::class,'view']);
    Route::put('update-order/{id}',[OrderController::class,'update']);

    Route::get('order-history',[OrderController::class,'orderhistory']);

    Route::get('users', [DashboardController::class, 'users'])->name('admin.users.view');
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);
    Route::get('edit-user/{id}', [DashboardController::class, 'editUser'])->name('admin.users.edit');
    Route::put('update-user/{id}', [DashboardController::class, 'updateUser'])->name('admin.users.update');

    Route::get('outlet_location',[LocationController::class, 'index']);
    Route::get('add-outlet_location',[LocationController::class, 'add']);
    Route::post('insert-location',[LocationController::class, 'insert']);

    Route::get('edit-location/{id}',[LocationController::class, 'edit']);
    Route::put('update-location/{id}',[LocationController::class, 'update']);
    Route::get('delete-location/{id}', [LocationController::class, 'destroy']);

    Route::get('product_outlets', [ProductOutletController::class, 'index']);
    Route::get('add-product_outlets', [ProductOutletController::class, 'add']);
    Route::post('insert-product_outlets', [ProductOutletController::class, 'insert']);

    Route::get('edit-product_outlets/{id}',[ProductOutletController::class, 'edit']);
    Route::put('update-product_outlets/{id}',[ProductOutletController::class, 'update']);
    Route::get('delete-product_outlets/{id}', [ProductOutletController::class, 'destroy']);

    Route::get('promotion', [PromotionController::class, 'index']);
    Route::get('add-promotion', [PromotionController::class, 'add']);
    Route::post('insert-promotion', [PromotionController::class, 'insert']);

    Route::get('edit-promotion/{id}',[PromotionController::class, 'edit']);
    Route::put('update-promotion/{id}',[PromotionController::class, 'update']);
    Route::get('delete-promotion/{id}', [PromotionController::class, 'destroy']);

    Route::get('colors', [ColorController::class, 'index']);
    Route::get('add-colors', [ColorController::class, 'add']);
    Route::post('insert-colors', [ColorController::class, 'insert']);
});