<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Images;

class CatalogController extends Controller
{
    public function showCatalog(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('Title', 'like', '%' . $search . '%');
        })->get();
        $images = Images::all();
        return view('catalog', compact(['products', 'images']));
    }

    public function categoryFilter(Request $request)
    {
        $categories = // Retrieve your categories here, assuming you have a Category model.
        $selectedCategory = $request->input('category');

        $products = Product::when($selectedCategory, function ($query) use ($selectedCategory) {
            return $query->where('category_id', $selectedCategory);
        })->get();
        $images = Images::all();
        return view('catalog', compact('products', 'categories','images'));
    }
}   
