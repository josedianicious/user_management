<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('/',[UserController::class,'index']);
    Route::get('user-index',[UserController::class,'index'])->name('user.index');
    Route::get('user-create',[UserController::class,'create'])->name('user.create');
    Route::get('user-login',[UserController::class,'login'])->name('user.login');
});
