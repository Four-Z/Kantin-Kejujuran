<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//Don't Need AUTH
Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\GeneralController::class, 'index'])->name('home');
Route::get('/home-sortByDate', [App\Http\Controllers\GeneralController::class, 'index_sortByDate'])->name('home_sortByDate');
Route::get('/home-sortByName', [App\Http\Controllers\GeneralController::class, 'index_sortByName'])->name('home_sortByName');
Route::get('/canteen-balance', [App\Http\Controllers\GeneralController::class, 'canteen_balance_page'])->name('canteen_balance_page');

//Need AUTH
Route::get('/add-product', [App\Http\Controllers\HomeController::class, 'add_product_page'])->name('add_product_page');
Route::post('/add-product', [App\Http\Controllers\HomeController::class, 'add_product'])->name('add_product');
Route::post('/buy-product', [App\Http\Controllers\HomeController::class, 'buy_product'])->name('buy_product');
Route::post('/add-balance', [App\Http\Controllers\HomeController::class, 'add_canteen_balance'])->name('add_canteen_balance');
Route::post('/withdraw-balance', [App\Http\Controllers\HomeController::class, 'withdraw_canteen_balance'])->name('withdraw_canteen_balance');
