<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Images;
use App\Models\Category;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(Request $request)
    {
        $user = Auth::user();
        $products = Product::with('images')->where('SellerID', '=', $user->id)->get();
        $productsCount = $products->count(); 
        $images = Images::all();
        return view('profile', compact(['user', 'products', 'productsCount', 'images']));
    }

    public function showProfileSeller($id) 
{
    // If $id is provided, find the user with the given ID
    // Otherwise, get the authenticated user
    $user = $id ? User::find($id) : auth()->user();

    if (!$user) {
        // Handle the case where the user is not found
        abort(404);
    }

    // Fetch the products for the specified seller
    $products = Product::with('images')->where('SellerID', '=', $user->id)->get();
    $productsCount = $products->count();
    $images = Images::all();

    // Pass $sellerId to the view to determine if it's the authenticated user's profile or another seller's profile
    return view('profile', compact(['user', 'products', 'productsCount', 'images']));
}

    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = [
            'name' => $request->filled('name') ? $request->input('name') : $user->name,
            'email' => $request->filled('email') ? $request->input('email') : $user->email,
            'location' => $request->filled('location') ? $request->input('location') : $user->location,
        ];
        // Update password only if provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
        // Update image only if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = $request->file('image')->store('storage/images');
        }

        $user->update($data);

        return redirect()->route('testHome')->with('success', 'Profile updated successfully.');
    }

    public function addCategoryForm()
    {
        return view('addCategory');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        Category::create([
            'CatName' => $request->input('name'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('showProfile')->with('success', 'Category added successfully.');
    }

}
