<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class,'create'])->name('home');

Route::get('/login', [AuthController::class,'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class,'store'])->middleware('guest')->name('log_in');

Route::get('/AddProduct', [MainController::class, 'createproduct'])->middleware('auth')->name('addproduct');
Route::post('/AddProduct', [MainController::class, 'create_product'])->middleware('auth')->name('add_product');

Route::get('/updatecategory/{slug}',[MainController::class, 'updatecategory'])->middleware('auth')->name('updatecategory');
Route::get('/updateproduct/{slug}',[MainController::class, 'updateproduct'])->middleware('auth')->name('updateproduct');

Route::post('/updatecategory/{slug}',[MainController::class, 'update_category'])->middleware('auth')->name('update_category');
Route::post('/updateproduct/{slug}',[MainController::class, 'update_product'])->middleware('auth')->name('update_product');

Route::get('/AddCategory', [MainController::class, 'createcategory'])->middleware('auth')->name('addcategory');
Route::post('/AddCategory', [MainController::class, 'create_category'])->middleware('auth')->name('add_category');

Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/product/{slug}',[MainController::class, 'product'])->name('products');

Route::get('/deletecategory/{slug}',[MainController::class, 'deletecategory'])->middleware('auth')->name('delcat');
Route::get('/deleteproducts/{slug}',[MainController::class, 'deleteproducts'])->middleware('auth')->name('delprod');

Route::get('/{slug}', [MainController::class,'create2']);
