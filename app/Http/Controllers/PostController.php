<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create_post');
    }

    public function store(){
        $content = request('content');
        error_log($content);
        return redirect('/');
    }
}
