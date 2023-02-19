<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

//Auth::routes();

Route::get('/login',[UserController::class, 'login'])->name('login');

Route::group(['middleware'=>'guest'],function(){

   Route::get('/vk/auth',[\App\Http\Controllers\SocialController::class,'index'])->name('vk.auth');
   Route::get('/vk/auth/callback',[\App\Http\Controllers\SocialController::class,'callback']);
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
