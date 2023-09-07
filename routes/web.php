<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/userLogout', [LoginController::class, 'userLogout'])->name('userLogout');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'auth'])->name('admin.auth');
        Route::post('/register', [AdminController::class, 'doRegister'])->name('admin.doRegister');
        Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
