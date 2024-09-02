<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){        
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name')
        ->where('posts.user_id', '=', Auth::id())
        ->orderBy('created', 'desc')
        ->get();

        $user = ['id' => Auth::id(), 'name' => Auth::user()->name];

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }
}
