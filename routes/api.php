<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Company\CategoryController;
use App\Http\Controllers\Api\V1\Company\ProductController;
use App\Http\Controllers\Api\V1\Company\UnitController;
use App\Http\Controllers\Api\V1\Expert\PortfolioController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['prefix' => 'v1/'], function(){
//     # Authentication
//     Route::post('/register/{user_type}', [AuthController::class, 'register']);
//     Route::post('/login/{user_type}', [AuthController::class, 'login'])->name('login');

//     # Get company
//     Route::get('get-companies', [OrderController::class, 'get_companies']);

//     Route::group(['prefix' => 'company/', 'middleware' => ['auth:company_api','scopes:companies']], function(){
//         # Update password
//         Route::post('/update-password', [AuthController::class, 'update_password']);

//         # Profile
//         Route::get('profile', [ProfileController::class, 'profile']);
//         // Route::post('/update-profile', [ProfileController::class, 'update_profile']);

//         # Unit
//         Route::apiResource('unit', UnitController::class);

//         # Category
//         Route::apiResource('category', CategoryController::class);

//         # Product
//         Route::apiResource('product', ProductController::class);

//         # Order
//         Route::get('/order', [OrderController::class, 'company_orders']);
//         Route::post('/order/set-products-prices', [OrderController::class, 'set_products_prices']);
//     });
//     Route::group(['prefix' => 'expert/', 'middleware' => ['auth:expert_api','scopes:experts']], function(){
//         # Update password
//         Route::post('/update-password', [AuthController::class, 'update_password']);

//         # Portfolio
//         Route::apiResource('portfolio', PortfolioController::class);

//         # Profile
//         Route::get('profile', [ProfileController::class, 'profile']);
//         // Route::post('/update-profile', [ProfileController::class, 'update_profile']);
//     });
//     Route::group(['prefix' => 'agent/', 'middleware' => ['auth:agent_api','scopes:agents']], function(){
//         # Update password
//         Route::post('/update-password', [AuthController::class, 'update_password']);

//         # Order
//         Route::post('/place-order', [OrderController::class, 'place_order']);
//         Route::apiResource('order', OrderController::class);
//         Route::post('/order/set-time-location/{order_id}', [OrderController::class, 'set_delivery_time_location']);
//         Route::post('/order/set-products-prices', [OrderController::class, 'set_product_prices']);

//         # Profile
//         Route::get('profile', [ProfileController::class, 'profile']);
//         // Route::post('/update-profile', [ProfileController::class, 'update_profile']);
//     });
//     Route::group(['prefix' => 'user/', 'middleware' => ['auth:user_api','scopes:users']], function(){
//         # Update password
//         Route::post('/update-password', [AuthController::class, 'update_password']);

//         # Profile
//         Route::get('profile', [ProfileController::class, 'profile']);
//         // Route::post('/update-profile', [ProfileController::class, 'update_profile']);
//     });
// });

// Route::fallback(function(){
//     return API(["message" => "Route not found !"], 404);
// });
