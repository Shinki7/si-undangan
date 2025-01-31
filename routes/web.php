<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('login', [AuthController::class, 'index'])->name('admin.login')->middleware('guest');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){

        Route::get('home',[HomeController::class,'index'])->name('admin.home');
        Route::resource('guest', 'App\Http\Controllers\GuestController');
});

Route::get('guest/{slug}', [FrontController::class, 'show'])->name('guest.show_guest');
Route::post('admin-login', [AuthController::class, 'auth_admin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
