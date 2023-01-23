<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopListController;
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

        Route::resource('shop', ShopController::class);
        Route::get('/shoplist/create', [ShopListController::class, 'create'])->name('shoplist.create');
        Route::post('/shoplist/store', [ShopListController::class, 'store'])->name('shoplist.store');
        Route::get('shop/{shop}/shoplist/index', [ShopListController::class, 'index'])->name('shop.shoplist.index');
        Route::patch('/shoplist/{shopList}/update', [ShopListController::class, 'update'])->name('shoplist.update');
        Route::delete('/shoplist/{shopList}/destroy', [ShopListController::class, 'destroy'])->name('shoplist.destroy');
        // Route::resource('shoplist', ShopListController::class);
        Route::resource('shop.product', ProductController::class);
        Route::resource('shop.productcategory', ProductCategoryController::class);
        Route::resource('product.productgallery', ProductGalleryController::class);
        Route::resource('product.productvariant', ProductVariantController::class);
        Route::resource('shop.order', OrderController::class);
        //Route::get('/shop/{shop?}/order/{order?}/add', [OrderController::class, 'add'])->name('add_order_item');
        Route::resource('shop.order.orderitem', OrderItemController::class);
    }));
    
});