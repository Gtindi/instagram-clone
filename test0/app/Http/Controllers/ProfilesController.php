<?php

namespace App\Http\Controllers;

use App\Models\User;

//use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
        now()->addSeconds(30),
        function() use ($user) {
                return $user->posts->count();
        });

        $followerCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        // $user = User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) : false;

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followerCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        // Ensure the current user is authorized to update the profile
        if (Auth::id() !== $user->id) {
            abort(403); // Unauthorized
        }

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $imagePath = null;
        $imageArray = [];

        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');

            $image = public_path("storage/{$imagePath}");
//            $image->save();
            $imageArray = ['image' => $imagePath];

        }

//        dd($data);

        $user->load('profile');
            // Check if the user has a profile
        if ($user->profile) {
            // Update the profile with the validated data
            $user->profile->update(array_merge(
                $data,
                $imageArray,
            ));
        }
        // auth()->user()->profile()->update($data);
        return redirect("profile/{$user->id}");

        dd($data);
    }
}
