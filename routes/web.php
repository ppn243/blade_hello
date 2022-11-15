<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//--------------------------Web sale--------------------------
Route::get('/trangchu', [PageController::class, 'getIndex']);

Route::get('/type/{id}',[PageController::class, 'getLoaiSp']);

Route::get('/detail/{id}',[PageController::class, 'getDetail']);

Route::get('/contact', [PageController::class, 'getContact']);

Route::get('/about', [PageController::class, 'getAbout']);

//-------------------------Cart---------------------------------
Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');

Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');

//-------------------------Checkout---------------------------------
Route::get('check-out', [PageController::class, 'getCheckout'])->name('dathang');
Route::get('check-out', [PageController::class, 'postCheckout'])->name('dathang');







Route::get('loai-san-pham/{type}', [PageController::class,'getLoaiSp']);

Route::get('chi-tiet-san-pham', [PageController::class,'getLienhe']);

// Route::get('/product_model', [PageController::class, 'getModel']);
// Route::get('/product_detail', [PageController::class, 'getDetail']);

// Route::get('gioi_thieu', [
//     'as' => 'about',
//     'uses' =>'PageController@getAbout'
// ]);