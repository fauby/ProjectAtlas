<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
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
}   
