<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
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

Auth::routes([
    'reset'=>true,
    'confirm'=>true,
    'verify'=>true,
]);
Route::get('reset',[ResetController::class,'reset'])->name('reset');

Route::get('/logout',[LoginController::class,'logout'])->name('get-logout');

Route::middleware(['auth'])->group(function(){
Route::group(['prefix'=>'person','namespace'=>'Person'],function(){
    Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class,'show'])->name('orders.show');
    Route::resource('application',ApplicationController::class);
});

    Route::group(['namespace'=>'Admin','prefix'=>'admin',],function (){
        Route::group(['middleware'=>'is_admin'],function(){
            Route::get('/orders', [OrderController::class,'index'])->name('home');
            Route::get('/orders/{order}', [OrderController::class,'show'])->name('orders.show');
        });
        Route::resource('products',ProductController::class);

        Route::resource('categories',CategoryController::class);

    });
});


Route::get('/main',[MainController::class,'index'])->name('index');
Route::get('/categories',[MainController::class,'categories'])->name('categories');
Route::get('/',[MainController::class,'main'])->name('main');

Route::group(['prefix'=>'basket'],function(){
    Route::post('/add/{product}',[BasketController::class,'basketAdd'])->name('basket-add');

    Route::group(['middleware'=>'basket_not_empty'],function(){
        Route::get('/',[BasketController::class,'basket'])->name('basket');
        Route::get('/place',[BasketController::class,'basketPlace'])->name('basket-place');
        Route::post('/remove/{product}',[BasketController::class,'basketRemove'])->name('basket-remove');
        Route::post('/place',[BasketController::class,'basketConfirm'])->name('basket-confirm');
    });
});



Route::get('/{category}',[MainController::class,'category'])->name('category');
Route::get('/{category}/{product?}',[MainController::class,'product'])->name('product');





