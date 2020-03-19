<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {   
        $data = request()->validate([
            'comment' => 'required'
        ]);
        
        auth()->user()->comments()->create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
            'comment' => $data['comment'],
        ]);
        
        return redirect()->route('post.show', [$post_id]);
    }

}
