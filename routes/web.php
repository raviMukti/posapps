<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Using Closure and redirect to dashboard
Route::get('/', function () {
    return redirect('/web/posapps/dashboard');
});

/**
 * Routes Call DashboardController
 */
Route::get('/web/posapps/dashboard', [DashboardController::class, 'index']);

/**
 * Group Of Routes CategoryController
 */
Route::group(['prefix' => '/web/posapps/category'], function(){
    Route::get('/list', [CategoryController::class, 'index']);
    Route::get('/page-create', [CategoryController::class, 'create']);
    Route::get('/page-bulk', [CategoryController::class, 'showBulk']);
    Route::get('/page-download', [CategoryController::class, 'showDownload']);

    // Store Category
    Route::post("/store", [CategoryController::class, 'store']);
});


/**
 * Group Of Routes ItemController
 */
Route::group(['prefix' => '/web/posapps/item'], function(){
    Route::get('/list', [ItemController::class, 'index']);
    Route::get('/page-create', [ItemController::class, 'create']);
    Route::get('/page-bulk', [ItemController::class, 'showBulk']);
    Route::get('/page-download', [ItemController::class, 'showDownload']);

    // Store Item
    Route::post('/store', [ItemController::class, 'store']);
});
