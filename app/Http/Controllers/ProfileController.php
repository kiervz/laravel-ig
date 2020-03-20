<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Profile;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($username)
    {
        $user = User::where("username", $username)->firstOrFail();
            
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $posts = Post::Where('user_id', $user->id)->latest()->paginate(9);

        return view('user-profile.profile', compact('user', 'posts', 'follows'));
    }

    public function show($username)
    {
        
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('user-profile.edit')->with('user', $user);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'description' => 'required',
            'url' => 'required',
            'image' => ''
        ]);
        
        if (request('image')) 
        {
            $destinationPath = request()->file('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$destinationPath}"))->fit(1200,1200);
            $image->save();
            $imageArray = ['image' => $destinationPath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []            
        ));
        
        return redirect('/profile/'. auth()->user()->username);
    }

}
