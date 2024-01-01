<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use App\Models\Wishlist;

class CatalogController extends Controller
{
    public function showCatalog(Request $request)
    {
        $search = $request->input('search');
        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('Title', 'like', '%' . $search . '%');
        })->get();
        $images = Images::all();
        $productsCount = $products->count();
        return view('catalog', compact(['products', 'images','productsCount']));
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
    public function wishlist()
    {
        // Get the authenticated user
        $user = Auth::user();
        $wishlistIds = Wishlist::where('UserID', $user->id)->pluck('ProductID');
        $products = Product::whereIn('id', $wishlistIds)->get();
        $images = Images::all();
        $categories = Category::all();
        $productsCount = $products->count();
        return view('catalog', compact('wishlistIds', 'products', 'images', 'categories','productsCount'));
    }
}   
