<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        error_log('Sucess!!!');
     

    }

    public function store(Request $request){
        error_log('Sucess!!!!!!');       
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $is_like = $request->is_like;
       
    }
}
