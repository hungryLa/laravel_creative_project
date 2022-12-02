<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommonController;
Route::get('/', [CommonController::class, 'index']);

use App\Http\Controllers\PostController;
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/first_or_create',[PostController::class,'firstOrCreate']);
Route::get('/posts/update/{id}',[PostController::class,'update']);
Route::get('/posts/update_or_create',[PostController::class,'updateOrCreate']);
Route::get('/posts/delete/{id}',[PostController::class,'delete']);

Route::get('/auth',[CommonController::class,'auth'])->name("auth");
Route::post('/auth',[CommonController::class,'auth'])->name("auth");

Route::get('/registration',[CommonController::class,'registration'])->name("registration");

Route::get('/cabinet',[UserController::class,'cabinet'])->name('cabinet');

