<?php

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
 * Group Of Routes ItemController
 */
Route::group(['prefix' => '/web/posapps'], function(){
    Route::get('/item', [ItemController::class, 'index']);
    Route::get('/item/page-create', [ItemController::class, 'create']);
    Route::get('/item/page-bulk', [ItemController::class, 'showBulk']);
    Route::get('/item/page-download', [ItemController::class, 'showDownload']);
});