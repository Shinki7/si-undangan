<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/dashboard/login',[AuthController::class,'index']);
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard/home', function (){
        return view('dashboard.home');
    });
});

Route::post('admin-login', [AuthController::class, 'auth_admin'])->name('admin.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});
