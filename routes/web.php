<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGalleryController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function(){
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('index');
        
        Route::middleware(['admin'])->group(function () {
            Route::resource('productcategory', ProductCategoryController::class);
            Route::resource('product', ProductController::class);
            Route::resource('productgallery', ProductGalleryController::class);
            Route::resource('order', OrderController::class);
            Route::resource('user', UserController::class);
        });
    });

    Route::name('dashboard.')->prefix('dashboard')->group((function (){
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::get('/showproducts', [ProductController::class, 'showlist'])->name('showProducts');
        Route::get('/addproduct', [ProductController::class, 'addproduct'])->name('addProduct');
        Route::get('/showproduct/{product?}', [ProductController::class, 'show'])->name('showProduct');

        Route::get('/showorders', [OrderController::class, 'showlist'])->name('showOrders');
    }));
    
});

Route::get('/', [HomeController::class, 'index'])->name('index');