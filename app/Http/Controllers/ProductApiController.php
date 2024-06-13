<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Images;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductApiController extends Controller
{

    public function store(Request $request)
    {
        try {
            $request->validate([
                'SellerID' => 'required',
                'Title' => 'required',
                'Description' => 'required',
                'Price' => 'required',
                'Category' => 'required',
                'Condition' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Save the product information
            $product = new Product([
                'SellerID' => $request->input('SellerID'),
                'Title' => $request->input('Title'),
                'Description' => $request->input('Description'),
                'Price' => $request->input('Price'),
                'Category' => $request->input('Category'),
                'Condition' => $request->input('Condition'),
            ]);
            $product->save();

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('public/images'); // Store the image
                // Associate the image with the product
                Images::create([
                    // 'Images' => $path,
                    'Images' => $image->store('storage/images'),
                    'ProductID' => $product->id,
                ]);
            }

            return response()->json(['message' => 'Product created successfully.'], 200);

        } catch (\Exception $e) {
            \Log::error('Error creating product: ' . $e->getMessage());
            return response()->json(['error' => 'Error creating product. Please try again.'], 500);
        }
    }



    public function show()
    {
        // Fetch products, images, and categories from the database
        $products = Product::all();
        $images = Images::all();
        $categories = Category::all();
        $wishlist = Wishlist::all();

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

        // If the request expects JSON, return JSON response
        return response()->json([
            'products' => $productsWithImages,
            'categories' => $categories,
            'wishlist'=> $wishlist
        ]);

        // Otherwise, return the view with the data
        return view('testHome', compact('productsWithImages', 'categories'));
    }



    public function showProductDetail($id) {
        // $user = User::findOrFail($product->SellerID);
        // $products = Product::all();

        // $hari = Carbon::now()->diffInDays($product->created_at);
        $produk = Product::all();
        $product = Product::findOrFail($id);
        $user = User::findOrFail($product->SellerID);
        $pengguna = User::all();
        $images = Images::where('ProductID', $product->id)->get();
        $fotos = Images::all();
        $products = Product::all();
        $hari = Carbon::now()->diffInDays($product->created_at);
        $categories = Category::all();

        return response()->json([
            'product' => $product,
            'user' => $user,
            'images' => $images,
            'hari' => $hari,
            'categories' => $categories,
        ]);

        // return view('detailProduct', compact(['product', 'user', 'products', 'hari']));
        // return view('detailProduct', compact(['product', 'user', 'images', 'hari']));
    }

    public function addToWishlist($id)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the product is already in the wishlist
        if (!Wishlist::where('ProductID', $id)->where('UserID', auth()->id())->exists()){
            // If not, add it to the wishlist
            Wishlist::create([
                'ProductID' => $id,
                'UserID' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Product added to wishlist.');
        }

        return redirect()->back()->with('warning', 'Product is already in the wishlist.');
    }

    public function images($productId)
    {
        // Fetch products, images, and categories from the database
        $response = $this->show();

        // Get the products from the response
        $products = $response->original['products'];

        // Find the product with the given productId
        $product = $products->firstWhere('id', $productId);

        if ($product) {
            // Construct the file path for the first image of the product
            $imagePath = public_path($product->images[0]);

            // Return the image file as a response
            return response()->file($imagePath);
        } else {
            // Return an error response if the product is not found
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function userImage($userId)
    {
        // Retrieve the user with the given ID from the database
        $user = User::findOrFail($userId);

        // Check if the user has an image
        if ($user->image) {
            // Construct the file path for the user's image
            $imagePath = public_path($user->image);

            // Return the user's image file as a response
            return response()->file($imagePath);
        } else {
            // Return an error response if the user does not have an image
            return response()->json(['error' => 'User image not found'], 404);
        }
    }



}
