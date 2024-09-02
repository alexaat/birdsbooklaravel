<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //$posts = Post::orderBy('created', 'desc') -> get();

        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name')
        ->orderBy('created', 'desc')
        ->get();

        return view('home', ['posts' => $posts]);
    }
}
