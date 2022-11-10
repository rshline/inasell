<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ShopController;
use App\Models\Shop;
use App\Models\ShopList;
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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function(){
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('index');
        
        Route::middleware(['admin'])->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('shop', ShopController::class);
        });
    });

    Route::name('dashboard.')->prefix('dashboard')->group((function (){
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('shop', Shop::class);
        Route::resource('shoplist', ShopList::class);
        Route::resource('shop.product', ProductController::class);
        Route::resource('shop.productcategory', ProductCategoryController::class);
        Route::resource('product.productgallery', ProductGalleryController::class);
        Route::resource('product.productvariant', ProductVariantController::class);
        Route::resource('shop.order', OrderController::class);
        Route::resource('order.orderitem', OrderController::class);
    }));
    
});