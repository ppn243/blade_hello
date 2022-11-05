<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/product_model', [PageController::class, 'getModel']);
Route::get('/product_detail', [PageController::class, 'getDetail']);

Route::get('/type/{id}',[PageController::class, 'getLoaiSp']);

Route::get('/detail/{id}',[PageController::class, 'getDetail']);

Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/about', [PageController::class, 'getAbout']);

Route::get('loai-san-pham/{type}', [PageController::class,'getLoaiSp']);

Route::get('chi-tiet-san-pham', [PageController::class,'getLienhe']);

// Route::get('gioi_thieu', [
//     'as' => 'about',
//     'uses' =>'PageController@getAbout'
// ]);