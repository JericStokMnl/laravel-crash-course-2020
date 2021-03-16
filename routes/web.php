<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('register', RegisterController::class)->only('index', 'store');
Route::resource('dasboard', DashboardController::class)->only('index');
Route::resource('login', LoginController::class)->only('index', 'store');
Route::post('logout', [LogoutController::class, 'store'])->name('logout');

Route::resource('post', PostsController::class)->only('index', 'store');
