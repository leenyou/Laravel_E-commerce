<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ProductController;




Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin_api', 'scopes:admin']], function () {
    Route::post('logout', [AuthController::class, 'adminLogout']);
});
//------------------------------------------------------------------------------------------
Route::get('admin/get', [HomeController::class, 'getAllAdmins']);
Route::get('admin/adminProfile/{id}', [HomeController::class, 'adminProfile']);
Route::get('admin/adminsCount', [HomeController::class, 'adminsCount']);
Route::get('admin/getAdminWallet', [HomeController::class, 'getAdminWallet']);
//------------------------------------------------------------------------------------------
Route::get('admin/get_category_productForAdmin/{admin_id}', [CategoryController::class, 'get_Categories_WithProductsForAdmin']);
Route::get('admin/get_all_categories_with_produts', [CategoryController::class, 'get_all_categories_with_produts']);
