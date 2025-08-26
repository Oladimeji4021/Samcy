<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UpdateProfilePictureRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;




class UserController extends Controller
{
    //
    public function me(Request $request)
    {
        return response()->json($request->user(), 200);
    }



    public function update(UserUpdateRequest $request)
    {
        $user = $request->user();
        $user->update($request->validated());

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ], 200);
    }


    public function updateProfilePicture(UpdateProfilePictureRequest $request)
    {
        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');

            $user->profile_picture = $path;
            $user->save();
        }

        return response()->json([
            'message' => 'Profile picture updated successfully',
            'user' => $user,
        ], 200);
    }
}
