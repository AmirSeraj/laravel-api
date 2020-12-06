<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
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
//})

########Auth routes
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:api')->name('logout');
Route::get('/CurrentUser',[AuthController::class,'currentUser'])->middleware('auth:api')->name('currentUser');

#########User routes
Route::prefix('/user')->group(function (){
    Route::get('/all',[UserController::class,'index'])->middleware('auth:api')->name('users');
    Route::post('/create',[UserController::class,'create'])->name('user.create');
    Route::put('/update/{user}',[UserController::class,'update'])->middleware('auth:api')->name('user.update');
    Route::delete('/delete/{user}',[UserController::class,'destroy'])->middleware('auth:api')->name('user.delete');
    Route::get('/show/{user}',[UserController::class,'show'])->middleware('auth:api')->name('user.show');
});

##########article routes
Route::prefix('/article')->middleware('auth:api')->group(function (){
    Route::get('/all',[ArticlesController::class,'index'])->name('articles');
    Route::get('/{article}',[ArticlesController::class,'show'])->name('article.show');
    Route::post('/create',[ArticlesController::class,'create'])->name('article.create');
    Route::put('/update/{article}',[ArticlesController::class,'update'])->name('article.update');
    Route::delete('/delete/{article}',[ArticlesController::class,'destroy'])->name('article.destroy');
});



