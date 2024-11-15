<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\TopPageController::class, 'top_page'])->name('top_page');
Route::get('/users', \App\Http\Controllers\UserController::class)->name('社員一覧')->middleware('auth');
Route::get('/roles', \App\Http\Controllers\RoleController::class)->name('ロール一覧')->middleware('auth');
Route::resource('/customers', \App\Http\Controllers\CustomerController::class)->middleware('auth');
Route::get('/customer_search', [App\Http\Controllers\CustomerSearchController::class, 'index'])->middleware('auth');
Route::post('/customer_search', [App\Http\Controllers\CustomerSearchController::class, 'search'])->middleware('auth');
Route::post('/customers/{customer}/logs', \App\Http\Controllers\CustomerLogController::class)->middleware('auth');
