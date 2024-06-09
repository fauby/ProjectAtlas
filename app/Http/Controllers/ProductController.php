<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Images;
use App\Models\Wishlist;
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

        try {

            $request->validate([
                'SellerID' => 'required',
                'Title' => 'required',
                'Description' => 'required',
                'Price' => 'required',
                'Category' => 'required',
                'Condition' => 'required',
                'Images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $product = new Product([
                'SellerID' => $request->input('SellerID'),
                'Title' => $request->input('Title'),
                'Description' => $request->input('Description'),
                'Price' => $request->input('Price'),
                'Category' => $request->input('Category'),
                'Condition' => $request->input('Condition'),
            ]);
            $product->save();
            foreach ($request->file('Images') as $image) {
                $image->store('public/images');
                Images::create([
                    'Images' => $image->store('storage/images'),
                    'ProductID' => $product->id,
                ]);
            }

            // foreach ($request->file('Images') as $image) {
            //     $destination_path = 'public/images/menu';
            //     // $image = $request->file('image');
            //     dd($image, $image_name);
            //     $image_name = $id.'_'.time().'_'.$image->getClientOriginalName();
            //     // $image->move(public_path('images'), $image_name);
            //     $path = $request->file('image')->storeAs($destination_path, $image_name);
            //     $path2 = 'storage/images/menu/'.$image_name;
            //     Images::create([
            //         'Images' => $image->$path2,
            //         'ProductID' => $product->id,
            //     ]);
            // }
            return redirect()->route('showProfile')->with('success', 'Product created successfully.');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error('Error creating product: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'Error creating product. Please try again.');
        }
    }

    public function show()
    {
        // Fetch products from the database
        $products = Product::all();
        $images = Images::all(); // Or adjust this query based on your needs
        $categories = Category::all();

        // If the request accepts JSON, return JSON data
        return response()->json([
            'products' => $products,
            'images' => $images,
            'categories' => $categories
        ]);

        return view('testHome', compact('products', 'images', 'categories'));

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

        return response()->json([
            'product' => $product,
            'user' => $user,
            'images' => $images,
            'hari' => $hari,
        ]);

        return view('detailProduct', compact(['product', 'user', 'images', 'products','hari', 'produk','fotos','pengguna']));

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

    // Public function index()
    // {
    //     $prods = Product::get();
    //     if (request()->segment(1) == 'api') return  response()->json([
    //         'error' => false,
    //         'list' => $prods,
    //     ]);
    //     return view('testHome', [
    //         'title' => 'Daftar Produk',
    //         'data' => $prods,
    //     ]);
    // }
}
