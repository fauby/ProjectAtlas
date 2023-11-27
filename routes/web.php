<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\ProductController::class, 'show'])->name('testHome');


// Route::get('/upload', 'ProductController@create');
// Route::get('/upload', 'ProductController@store');
Route::get('/upload', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/upload/add', [App\Http\Controllers\ProductController::class, 'store']);


