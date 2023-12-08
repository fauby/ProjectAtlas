<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Image;


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
        // dd($user);
        return view('profile', compact(['user', 'products', 'productsCount']));
    }

    public function showProfileSeller($id)
    {
        // $user = Auth::user();

        // If $sellerId is provided, fetch the profile for that seller
        // Otherwise, use the specified seller's profile or all users if $sellerId is not provided
        if ($id) {
            $user = User::find($id);

            // Fetch the products for the specified seller
            $products = Product::with('images')->where('id', '=', $id)->get();
        } else {
            // Use the specified seller's profile if $id is provided
            // Otherwise, use all users if the user is not authenticated
            $user = $id ? User::find($id) : null;

            // Fetch the products for the specified seller or all users if the user is not authenticated
            $products = $user ? Product::with('images')->where('id', '=', $user->id)->get() : collect();
        }

        $productsCount = $products->count();
        
        // Pass $sellerId to the view to determine if it's the authenticated user's profile or another seller's profile
        return view('profile', compact(['user', 'products', 'productsCount']));
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

}
