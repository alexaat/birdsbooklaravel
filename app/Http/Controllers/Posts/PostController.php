<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function create(){
        return view('create_post');
    }

    public function store(Request $request){
        
        //Save file
        $uuid =  (string) Str::orderedUuid();
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $request->file->move(public_path('images'), $uuid);         
        
        $content = request('content');

        $post = new Post();

        $post->content = $content;
        $post->image = $uuid;
        $post->user_id = Auth::id();

        $post->save();

        return redirect('/');
    }
}
