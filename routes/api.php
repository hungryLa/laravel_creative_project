<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AuthController;
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login',  [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});
use App\Http\Controllers\Post\IndexController;

Route::group([ 'middleware' => 'jwt.auth'], function(){
    Route::get('/posts',[IndexController::class]);
    Route::get('/posts/create', CreateController::class);
    Route::post('/posts', StoreController::class);
    Route::get('/posts/{post}', ShowController::class);
    Route::get('/posts/{post}/edit', EditController::class);
    Route::patch('/posts/{post}', UpdateController::class);
    Route::delete('/posts/{post}', DeleteController::class);
});

