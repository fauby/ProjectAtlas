<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function testHome()
    {
        return view('testHome');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $products = Product::where('SellerID', '=', $user->id)->get();
        $productsCount = $products->count();
        return view('profile', compact(['user', 'products', 'productsCount']));
    }
}
