<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfilesController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show($username)
    {
        $user = User::where("username", $username)->firstOrFail();
        
        return view('user.profile', [
            'user' => $user
        ]);
    }
}
