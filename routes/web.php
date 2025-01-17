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

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create']);

Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('show');

Route::post('/profile/create', [App\Http\Controllers\ProfileController::class, 'store']);

Route::post('/likes', [App\Http\Controllers\LikeController::class, 'store']);
Route::get('/likes', [App\Http\Controllers\LikeController::class, 'index']);

