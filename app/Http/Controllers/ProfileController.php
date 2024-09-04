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


        $user = ['id' => Auth::id(), 'name' => Auth::user()->name, 'image' => '', 'icon_letters' => '', 'email' => ''];
        
        if(Auth::user()->image){
            $user['image'] = Auth::user()->image;
        } else {
           $user['icon_letters'] = substr(Auth::user()->name, 0, 1);
        }    

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }

    public function create(){
        return view('create_profile');
    }
}
