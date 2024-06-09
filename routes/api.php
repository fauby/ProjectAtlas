<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('product', ProductController::class);
Route::get('products', [ProductController::class, 'show']);
Route::get('product/{id}', [ProductController::class, 'showProductDetail']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::get('/productDetail/{id}', [ProductController::class, 'showProductDetail']);
Route::get('/image/{filename}', function ($filename) {
    $path = public_path('storage/images/' . $filename);

    if (!file_exists($path)) {
        return response()->json(['error' => 'Image not found'], 404);
    }

    return response()->json(['url' => asset('storage/images/' . $filename)]);
});


// Route::prefix('products')->group(function () {
//     Route::get('home', [ProductController::class, 'show']); // Endpoint to fetch all products
//     Route::post('/create', [ProductController::class, 'store']); // Endpoint to create a new product
//     Route::get('/{id}', [ProductController::class, 'show']); // Endpoint to fetch a specific product by ID
//     Route::post('/{id}/wishlist', [ProductController::class, 'addToWishlist']); // Endpoint to add a product to wishlist
// });

// Route::prefix('product')->group(function () {
//     Route::get('/create', [ProductController::class, 'create']); // Endpoint to show the create product form
//     Route::get('/{id}', [ProductController::class, 'showProductDetail']); // Endpoint to fetch detailed information about a product
// });


// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
