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
 
// HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\ProductController::class, 'show'])->name('testHome');

// Profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'showProfile'])->name('showProfile');
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profileedit');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'showProfileSeller'])->name('showProfileSeller');
Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profileupdate');

// Route::get('/upload', 'ProductController@create');
// Route::get('/upload', 'ProductController@store');
Route::get('/upload', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/upload/add', [App\Http\Controllers\ProductController::class, 'store']);
// Detail Produk
Route::get('/productDetail/{id}', [App\Http\Controllers\ProductController::class, 'showProductDetail'])->name('showProductDetail');
// Catalog by Search
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'showCatalog'])->name('showCatalog');
Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'categoryFilter'])->name('categoryFilter');



