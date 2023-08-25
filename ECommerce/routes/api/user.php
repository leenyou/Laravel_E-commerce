<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\OrderController;

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

Route::group(['prefix' => 'user', 'middleware' => ['auth:user_api', 'scopes:user']], function () {
    Route::post('logout', [AuthController::class, 'userLogout']);
});
Route::post('user/register', [AuthController::class, 'userRegister']);
Route::post('user/login', [AuthController::class, 'userLogin']);

Route::post('user/password/email', [AuthController::class, 'user_forgetPassword']);
Route::post('user/code/check', [AuthController::class, 'checkCode']);
Route::post('user/password/reset', [AuthController::class, 'userResetPassword']);

Route::get('user/get', [HomeController::class, 'getUsers']);
Route::get('user/userProfile/{id}', [HomeController::class, 'userProfile']);
Route::get('user/getUser', [HomeController::class, 'getUser']);
Route::get('user/usersCount', [HomeController::class, 'usersCount']);

// FAVORITES
Route::post('user/add_to_favorites/{product_id}', [HomeController::class, 'add_to_favorites']);
Route::delete('user/remove_from_favorites/{product_id}', [HomeController::class, 'remove_from_favorites']);
Route::get('user/get_all_favorites', [HomeController::class, 'get_all_favorites']);
// RATES
Route::post('user/add_rate/{product_id}', [HomeController::class, 'add_rate']);
Route::get('user/show_rate/{product_id}', [HomeController::class, 'show_rate']);
// COMMENTS
Route::post('user/add_comment/{product_id}', [HomeController::class, 'add_comment']);
Route::delete('user/delete_comment/{comment_id}', [HomeController::class, 'delete_comment']);
Route::get('user/get_product_comments/{product_id}', [HomeController::class, 'get_product_comments']);
// CART
Route::post('user/add_to_cart/{variant_id}', [ProductController::class, 'add_to_cart']);
Route::post('user/increase_quantity/{variant_id}', [ProductController::class, 'increase_quantity']);
Route::post('user/decrease_quantity/{variant_id}', [ProductController::class, 'decrease_quantity']);
Route::delete('user/remove_from_cart/{variant_id}', [ProductController::class, 'remove_from_cart']);
Route::delete('user/clear_cart', [ProductController::class, 'clear_cart']);
Route::get('user/get_cart_items', [ProductController::class, 'get_cart_items']);
// ORDER
Route::get('user/confirm_order', [OrderController::class, 'confirm_order']);
Route::get('user/check_items', [OrderController::class, 'check_items']);
Route::get('user/get_user_orders', [OrderController::class, 'get_user_orders']);
Route::get('user/ordersCount', [HomeController::class, 'ordersCount']);
Route::get('user/Orders_History_for_all_users', [OrderController::class, 'Orders_History_for_all_users']);
