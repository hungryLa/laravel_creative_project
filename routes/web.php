<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;


Route::get('/', [CommonController::class, 'index']);

Route::get('/auth',[CommonController::class,'auth'])->name("auth");
Route::post('/auth',[CommonController::class,'auth'])->name("auth");

Route::get('/registration',[CommonController::class,'registration'])->name("registration");

Route::get('/cabinet',[UserController::class,'cabinet'])->name('cabinet');