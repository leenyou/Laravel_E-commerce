<?php

use App\Http\Controllers\api\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\api\ProductController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin_api', 'scopes:admin']], function () {
});
// PRODUCT
Route::post('product/add_product/{category_id}', [ProductController::class, 'add_product']);
Route::post('product/add_variants/{product_id}', [ProductController::class, 'add_variants']);
Route::post('product/aprove_product', [ProductController::class, 'aprove_product']);
Route::post('product/add_discount/{product_id}', [ProductController::class, 'add_discount']);
Route::post('product/add_tag/{product_id}', [ProductController::class, 'add_tag']);
Route::post('product/add_type', [ProductController::class, 'add_type']);
Route::post('product/add_color', [ProductController::class, 'add_color']);
Route::post('product/add_size/{type_id}', [ProductController::class, 'add_size']);

Route::delete('product/delete_product/{id}', [ProductController::class, 'delete_product']);

Route::get('product/product_profile/{id}', [ProductController::class, 'product_profile']);
Route::get('product/get_all_products', [ProductController::class, 'get_all_products']);
Route::get('product/get_admin_products/{admin_id}', [ProductController::class, 'get_admin_products']);
Route::get('product/get_latest_products', [ProductController::class, 'get_latest_products']);
Route::get('product/get_highest_sellcount', [HomeController::class, 'get_highest_sellcount']);
Route::get('product/get_tag_products/{tag_id}', [ProductController::class, 'get_tag_products']);
Route::get('product/get_pending_products', [ProductController::class, 'get_pending_products']);

Route::get('product/get_all_tags', [ProductController::class, 'get_all_tags']);
Route::get('product/get_types', [ProductController::class, 'get_types']);
Route::get('product/get_colors', [ProductController::class, 'get_colors']);
Route::get('product/get_type_sizes/{type_id}', [ProductController::class, 'get_type_sizes']);

Route::post('product/search_all_products', [ProductController::class, 'search_all_products']);
Route::post('product/search_admin_products/{admin_id}', [ProductController::class, 'search_admin_products']);
