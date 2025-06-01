<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Get logged-in user id
        $userId = Auth::id();

        // Get all cart items for the user with related product info
        $cartItems = Cart::with('product')
            ->where('UserID', $userId)
            ->get();

        // Pass to view
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, $productId)
    {
        $userId = Auth::id(); // Ensure user is logged in

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $cartItem = Cart::where('UserID', $userId)
                        ->where('ProductID', $productId)
                        ->first();

        if ($cartItem) {
            // Jika produk sudah di keranjang, tambah Qty
            $cartItem->Qty += 1;
            $cartItem->save();
        } else {
            // Jika belum, buat entri baru
            Cart::create([
                'UserID' => $userId,
                'ProductID' => $productId,
                'Qty' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
