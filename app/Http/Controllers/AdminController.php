<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(){
        return view('admin.adminHome');
    }

    public function showCategoryAdmin(){
        $categories = Category::all();

        return view('admin.adminCategory', compact('categories'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'CatName' => 'required|string|max:255',
        ]);

        $categories = new Category([
            'CatName' => $request->input('CatName'),
        ]);

        $categories->save();

        return redirect()->route('adminCategory')->with('success', 'Product created successfully.');

    }
}
