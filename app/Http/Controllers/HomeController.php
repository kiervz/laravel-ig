<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
        $user = Auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $user)
                    ->orWhere('user_id', auth()->user()->id)->latest()->get();

        
        return view('home', compact('users', 'posts'));
    }
}
