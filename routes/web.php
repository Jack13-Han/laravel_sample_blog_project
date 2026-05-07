<?php

// use App\Http\Controllers\PostController;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/',[PostController::class,'index'])->name('post.index');
// Route::get('/posts-create',[PostController::class,'create'])->name('post.create');
// Route::post('/posts-create',[PostController::class,'store'])->name('post.store');
// Route::get('/posts/{id}',[PostController::class,'show'])->name('post.show');

// Route::get('/posts-edit/{id}',[PostController::class,'edit'])->name('post.edit');
// Route::put('/posts/{id}',[PostController::class,'update'])->name('post.update');

// Route::delete('/posts/{id}',[PostController::class,'destroy'])->name('post.destroy');


Route::redirect('/', 'post');('/');

Route::resource('/post',PostController::class);

