<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;

Route::get('/admin/login',[AuthController::class,'index']);

Route::group(['prefix' => 'admin'],function(){
    Route::middleware(['auth'])->group(function(){
        Route::get('home',[HomeController::class,'index']);
        Route::resource('guest', 'App\Http\Controllers\GuestController');
    });
});


Route::post('admin-login', [AuthController::class, 'auth_admin'])->name('admin.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
