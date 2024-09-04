<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\User;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only(['create', 'store']);
    }

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

        $user['email'] = Auth::user()->email;

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }    

    public function create(){

        $user = ['id' => Auth::id(), 'name' => Auth::user()->name, 'image' => '', 'icon_letters' => '', 'email' => ''];
        
        if(Auth::user()->image){
            $user['image'] = Auth::user()->image;
        } else {
           $user['icon_letters'] = substr(Auth::user()->name, 0, 1);
        }    

        error_log(Auth::id());

        return view('create_profile', ['user' => $user]);
    }

    public function store(Request $request){
        
        $old = Auth::user()->image;
        
        //Save file
        $uuid =  (string) Str::orderedUuid();
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $request->file->move(public_path('profiles'), $uuid);         

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['image' => $uuid]);

        if($old){
            $path = "profiles/".$old;           
            File::delete($path);
        }

        $id = Auth::id();

        return redirect("profile/".$id);
    }

    public function show($id){
    
        if($id == Auth::id()){
            return redirect('profile/');
        }
        
        $u = User::findOrFail($id);

        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'users.name')
        ->where('posts.user_id', '=', $id)
        ->orderBy('created', 'desc')
        ->get();
        
        $user = ['id' => $u->id, 'name' => $u->name, 'image' => '', 'icon_letters' => '', 'email' => ''];
        
        if($u->image){
            $user['image'] = $u->image;
        } else {
           $user['icon_letters'] = substr($u->name, 0, 1);
        }       

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }
}
