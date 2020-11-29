<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UserController;
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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/users',[UserController::class,'index'])->name('users');
Route::post('/user/create',[UserController::class,'create'])->name('user.create');

Route::get('/articles',[ArticlesController::class,'index'])->name('articles');
Route::post('/article/create',[ArticlesController::class,'create'])->name('article.create');
