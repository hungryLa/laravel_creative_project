<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommonController;
Route::get('/', [CommonController::class, 'index'])->name('main');

use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::patch('/posts/{post}',[PostController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class,'delete'])->name('posts.delete');

Route::get('/posts/first_or_create',[PostController::class,'firstOrCreate']);
Route::get('/posts/update_or_create',[PostController::class,'updateOrCreate']);

use App\Http\Controllers\TopicController;
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
Route::get('/topics/{post}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/topics/{post}/edit', [TopicController::class, 'edit'])->name('topics.edit');
Route::patch('/topics/{post}', [TopicController::class, 'update'])->name('topics.update');
Route::delete('/topics/{post}', [TopicController::class, 'delete'])->name('topics.delete');


Route::get('/auth',[CommonController::class,'auth'])->name("auth");
Route::post('/auth',[CommonController::class,'auth'])->name("auth");

Route::get('/registration',[CommonController::class,'registration'])->name("registration");

Route::get('/cabinet',[UserController::class,'cabinet'])->name('cabinet');

