<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/posts/create', 'App\Http\Controllers\PostController@create');

Route::post('/posts/create', 'App\Http\Controllers\PostController@store');
