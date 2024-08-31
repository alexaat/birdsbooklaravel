<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
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
        
        
        
        
        error_log($uuid);
        return redirect('/');
    }
}
