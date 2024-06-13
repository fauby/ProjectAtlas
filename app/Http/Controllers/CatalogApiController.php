<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use App\Models\Wishlist;

class CatalogApiController extends Controller
{
    public function showCatalog(Request $request)
    {
        $search = $request->input('search');
        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('Title', 'like', '%' . $search . '%');
        })->get();
        $images = Images::all();
        $categories = Category::all();
        $productsCount = $products->count();
        return view('catalog', compact(['products', 'images','productsCount', 'categories']));
    }

    public function categoryFilter(Request $request, $id)
    {
        // Retrieve your categories here, assuming you have a Category model.
        $categories = Category::all();
        // Get the selected category
        $selectedCategory = $id;
        // Fetch products based on the selected category
        $products = Product::where('Category', $selectedCategory)->get();
        $images = Images::all();
        $productsCount = $products->count();

        return view('catalog', compact('products', 'categories', 'images','productsCount'));
    }

    public function wishlist($userId)
    {
        // Use $userId to fetch the wishlist for the specified user
        $wishlistIds = Wishlist::where('UserID', $userId)->pluck('ProductID');
        $products = Product::whereIn('id', $wishlistIds)->get();
        $images = Images::all();
        $categories = Category::all();
        $productsCount = $products->count();

        // Create a map of product images for quick lookup
        $productImages = [];
        foreach ($images as $image) {
            $productImages[$image->ProductID][] = $image->Images;
        }

        // Append images to their respective products
        $productsWithImages = $products->map(function ($product) use ($productImages) {
            $product->images = $productImages[$product->id] ?? [];
            return $product;
        });

        // Prepare the data for JSON response
        $wishlist = [
            'wishlistIds' => $wishlistIds,
            'products' => $productsWithImages,
            'categories' => $categories,
            'productsCount' => $productsCount
        ];

        // Return JSON response
        return response()->json($wishlist);
    }



}
