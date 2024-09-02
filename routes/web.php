<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/posts/create', 'App\Http\Controllers\Posts\PostController@create');

Route::post('/posts/create', 'App\Http\Controllers\Posts\PostController@store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
