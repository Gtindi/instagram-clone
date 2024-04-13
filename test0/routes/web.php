<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

// Auth::routes();
Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('post');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
