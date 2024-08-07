<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use Illuminate\Support\Facades\Route;




Route::post('login',[AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);
Route::post('logout',[AuthController::class,'logout']);
Route::post('change-password',[AuthController::class,'changePassword']);
Route::get('user',[AuthController::class, 'user'])->middleware('auth:sanctum');

Route::apiResources([
   'categories' => CategoryController::class,
   'statuses' => StatusController::class,
   'statuses.orders' => StatusOrderController::class,
   'favorites' => FavoriteController::class,
   'products' => ProductController::class,
   "categories.products" => CategoryProductController::class,
   'orders' => OrderController::class,
   'delivery-methods' => DeliveryMethodController::class,
   'payment-types' => PaymentTypeController::class,
   'user-addresses' => UserAddressController::class,
   'user-payment-cards' => UserPaymentCardsController::class,
   'reviews' => ReviewController::class,
   'products.reviews' => ProductReviewController::class,
]);