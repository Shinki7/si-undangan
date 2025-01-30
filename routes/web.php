<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;

Route::get('login', [AuthController::class, 'index'])->name('admin.login')->middleware('guest');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){

        Route::get('home',[HomeController::class,'index'])->name('admin.home');
        Route::resource('guest', 'App\Http\Controllers\GuestController');
});


Route::post('admin-login', [AuthController::class, 'auth_admin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
