<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Images;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
        // $user = Auth::user();
        // $categories = Category::all();
        // Validate the request data
        try {
            // Validate the request data
            $request->validate([
                'SellerID' => 'required',
                'Title' => 'required',
                'Description' => 'required',
                'Price' => 'required',
                'Category' => 'required',
                'Condition' => 'required',
                'Images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Store the uploaded image
            // $imagePath = $request->file('Image')->storeAs('public/images', $request->Image->hashName());
            // $imagePath = $request->file('Image')->store('public/images');

            // Create a new Product with the form data
            $product = new Product([
                'SellerID' => $request->input('SellerID'),
                'Title' => $request->input('Title'),
                'Description' => $request->input('Description'),
                'Price' => $request->input('Price'),
                'Category' => $request->input('Category'),
                'Condition' => $request->input('Condition'),
                // 'Image' => $request->file('Image')->store('storage/images'), // Save the path to the stored image
            ]);

            // Save the product to the database
            $product->save();

            // Store the uploaded images
            foreach ($request->file('Images') as $image) {
                $image->store('public/images');
                // $product->images()->create(['Images' => $image->store('storage/images')]);
                // $product->images()->create([
                //     'Images' => $image->store('storage/images'),
                //     'ProductID' => $product->id,
                // ]);
                Images::create([
                    'Images' => $image->store('storage/images'),
                    'ProductID' => $product->id,
                ]);

            }

            // $product->save();


            // Redirect with success message
            return redirect()->route('showProfile')->with('success', 'Product created successfully.');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error('Error creating product: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Error creating product. Please try again.');
        }
    }

    public function show ()
    {
        // Fetch products from the database
        $products = Product::all();
        $images = Images::all(); // Or adjust this query based on your needs

        // Pass the $products and $images variables to the view
        return view('testHome', compact('products', 'images'));
    }

    public function showProductDetail($id) {
        $product = Product::findOrFail($id);
        $user = User::findOrFail($product['SellerID']);
        $products = Product::all();

        $hari = Carbon::now()->diffInDays($product['created_at']);
        return view('detailProduct', compact(['product', 'user', 'products', 'hari']));
    }

    public function showProductDetail($id) {
        $product = Product::findOrFail($id);
        $user = User::findOrFail($product['SellerID']);
        $products = Product::all();

        $hari = Carbon::now()->diffInDays($product['created_at']);
        return view('detailProduct', compact(['product', 'user', 'products', 'hari']));
    }
}
