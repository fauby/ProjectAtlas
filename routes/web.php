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
// Redirect / to /test
Route::redirect('/', '/test');

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
Route::get('/filter/{id}', [App\Http\Controllers\CatalogController::class, 'categoryFilter'])->name('categoryFilter');
// Chat
//Route::get('/chat', [App\Http\Controllers\chatController::class, 'index'])->name('index');
Route::post('/wishlist/{id}', [App\Http\Controllers\ProductController::class, 'addToWishlist'])
    ->middleware('auth')
    ->name('wishlist');
Route::get('/wishlistUser', [App\Http\Controllers\CatalogController::class, 'wishlist'])->name('wishlistUser');Route::get('/chat', 'App\Http\Controllers\chatController@index');
Route::get('/chat/history/{userId}', [App\Http\Controllers\ChatController::class, 'showChatHistory'])->name('chat.history');
Route::post('/chat/sendMessage/{userId}', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('sendMessage');
Route::post('/chat/sendOfferMessage/{userId}', [App\Http\Controllers\ChatController::class, 'sendOfferMessage'])->name('sendOfferMessage');
// Route::get('/chat', function() {
//     //PusherBroadcast::dispatch('Lorem ipsum');
//     //event(new PusherBroadcast('Lorem Ipsum'));
//     return view('chat');
// });
Route ::get('/addCategory', [App\Http\Controllers\ProfileController::class, 'addCategoryForm'])->name('addCategoryForm');
Route ::post('/addCategory', [App\Http\Controllers\ProfileController::class, 'addCategory'])->name('addCategory');
