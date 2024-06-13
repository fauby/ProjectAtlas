<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'location' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();

        if ($request->filled('password')) {
            $input['password'] = bcrypt($request->input('password'));
        }

        $user->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'data' => $user
        ]);
    }

    public function updateImage(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                422
            );
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            // Images::create([
            //     'Images' => $image->store('storage/images')
            // ]);
            $user->update(['image' => $imagePath]);
        }
        // Update image only if provided
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/images');
        //     $data['image'] = $request->file('image')->store('storage/images');
        // }

        return response()->json([
            'success' => true,
            'message' => 'Profile image updated successfully.',
            'data' => $user
        ]);
    }
}

?>
