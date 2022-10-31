<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;


Route::get('/', [CommonController::class, 'index']);
