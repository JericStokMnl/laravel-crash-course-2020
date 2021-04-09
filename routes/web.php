<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource('register', RegisterController::class)->only('index', 'store');
Route::resource('dasboard', DashboardController::class)->only('index');
Route::resource('login', LoginController::class)->only('index', 'store');
Route::resource('post', PostsController::class)->only('index', 'store', 'destroy');

Route::post('logout', [LogoutController::class, 'store'])->name('logout');
Route::get('user/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::post('post/{post}/likes', [PostLikeController::class, 'store'])->name('post.likes');
Route::delete('post/{post}/likes', [PostLikeController::class, 'destroy'])->name('post.likes');


