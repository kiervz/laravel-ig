<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function index()
    {
        return redirect('/profile/' . auth()->user()->username);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']  
        ]);

        
        $destinationPath = $request->file('image')->store('post', 'public');
        $image = Image::make(public_path("storage/{$destinationPath}"))->fit(1200,1200);
        $image->save();
        
        auth()->user()->posts()->create([
            'user_id' => auth()->user()->id,
            'caption' => $data['caption'],
            'image' => $destinationPath
        ]);

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        $users_comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('profiles', 'users.id', 'profiles.user_id')
        ->select('comments.comment', 'comments.post_id', 'comments.created_at', 'users.username', 'profiles.image')
        ->where('comments.post_id', '=', $id)
        ->get();

        return view('post.show', [
            'post' => $post,
            'users_comments' => $users_comments
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {

    }


}
