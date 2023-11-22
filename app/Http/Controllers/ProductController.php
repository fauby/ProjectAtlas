<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    public function create(){
        $user = Auth::user();
        $categories = Category::all();

        $categoryAttributes = $categories->map(function ($category) {
            return collect($category->getAttributes())->toArray();
        })->toArray();

        // dd($categoryAttributes);

        if (!$user) {
            return redirect()->route('login');
        }else{
            // return view('uploadProduct');
            return view('uploadProduct')->with('categoryInfo', $categoryAttributes);
        }

    }

    public function store(Request $request){
        $user = Auth::user();
        $categories = Category::all();
        $request->validate([
            'SellerID' => 'required',
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Category' => 'required',
            'Condition' => 'required',
            'Image' => 'required',
        ]);

        $request->Image->store('images', 'public');
        $request->Image = $request->Image->hashName();

        Product::create($request->all());

        return redirect()->route('testHome')
                        ->with('success', 'Product created successfully.');
        // $name = $request->file('image')->getClientoriginalName();
        // $request->file('photo')->storeAs('public/images/'. $name);
        // $photo = new Photo();
        // $photo->name = $name;
        // $photo->save;
        // return redirect()->back();
    }
}
