<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {   
        return auth()->user()->following()->toggle($user->profile);
    }

}
