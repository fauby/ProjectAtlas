<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Models\Images;

class ImageController extends Controller
{

    public function getImageMenuByPath(Request $request, $imagePath){
        try {
            $filePath = 'storage/images/' . $imagePath;
            // dd($filePath);
            return response()->file(public_path($filePath));
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
