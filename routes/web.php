<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\CommonController;
Route::get('/', [CommonController::class, 'index'])->name('main');


Route::group([], function(){
    Route::get('/posts', IndexController::class)->name('posts.index');
    Route::get('/posts/create',CreateController::class)->name('posts.create');
    Route::post('/posts',StoreController::class)->name('posts.store');
    Route::get('/posts/{post}',ShowController::class)->name('posts.show');
    Route::get('/posts/{post}/edit',EditController::class)->name('posts.edit');
    Route::patch('/posts/{post}',UpdateController::class)->name('posts.update');
    Route::delete('/posts/{post}',DeleteController::class)->name('posts.delete');
});

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

