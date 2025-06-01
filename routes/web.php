<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CartController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test', [ProductController::class, 'show'])->name('testHome');
// Redirect / to /test
Route::redirect('/', '/test');

// Profile
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profileedit');
Route::get('/profile/{id}', [ProfileController::class, 'showProfileSeller'])->name('showProfileSeller');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profileupdate');

// Route::get('/upload', 'ProductController@create');
// Route::get('/upload', 'ProductController@store');
Route::get('/upload', [ProductController::class, 'create'])->name('create');
Route::post('/upload/add', [ProductController::class, 'store']);
// Detail Produk
Route::get('/productDetail/{id}', [ProductController::class, 'showProductDetail'])->name('showProductDetail');
// Catalog by Search
Route::get('/catalog', [CatalogController::class, 'showCatalog'])->name('showCatalog');
Route::get('/filter/{id}', [CatalogController::class, 'categoryFilter'])->name('categoryFilter');
// Chat
//Route::get('/chat', [chatController::class, 'index'])->name('index');
Route::post('/wishlist/{id}', [ProductController::class, 'addToWishlist'])
    ->middleware('auth')
    ->name('wishlist');
Route::get('/wishlistUser', [CatalogController::class, 'wishlist'])->name('wishlistUser');
Route::get('/chat', 'chatController@index');
Route::get('/chat/history/{userId}', [ChatController::class, 'showChatHistory'])->name('chat.history');
Route::post('/chat/sendMessage/{userId}', [ChatController::class, 'sendMessage'])->name('sendMessage');
Route::post('/chat/sendOfferMessage/{userId}', [ChatController::class, 'sendOfferMessage'])->name('sendOfferMessage');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])
    ->middleware('auth')
    ->name('cart.add');



Route ::get('/adminHome', [AdminController::class, 'index'])
    ->name('adminHome')
    ->middleware(['auth', 'role:admin']); 

Route ::get('/adminCategory', [AdminController::class, 'showCategoryAdmin'])
    ->name('adminCategory')
    ->middleware(['auth', 'role:admin']); 

Route::post('/adminCategory', [AdminController::class, 'storeCategory'])
    ->name('adminCategoriesStore')
    ->middleware(['auth', 'role:admin']);

Route::get('/adminProduct', [ProductController::class, 'showAdmin'])
    ->name('adminProduct')
    ->middleware(['auth', 'role:admin']);

Route::delete('/adminProduct/{id}', [ProductController::class, 'destroyAdmin'])
    ->name('adminProductDestroy')
    ->middleware(['auth', 'role:admin']);
// Route::patch('/admin/products/{id}/archive', [ProductController::class, 'archive'])
//     ->name('adminProductArchive')
//     ->middleware(['auth', 'role:admin']);



