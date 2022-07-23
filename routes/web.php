<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes - documents routers
|--------------------------------------------------------------------------
| : description
|
|
|
|
*/

Route::get('/', [HomeController::class, 'cover'])->name('cover');
Route::get('/home', [HomeController::class, 'landing'])->name('home');

Route::resource('users', UserController::class)->names('user')->parameters(['users'=>'user']);
Route::resource('posts', PostController::class)->names('post')->parameters(['posts'=>'post']);

Route::get('users/buscar/usuario', [UserController::class, 'find'])->name('user.find');
Route::get('users/lista-usuarios/resultado', [UserController::class, 'findList'])->name('user.find.list');
