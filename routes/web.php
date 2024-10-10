<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\CekLevel;
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

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-action', [LoginController::class, 'authenticate'])->name('login.action');
Route::get('/login-logout', [LoginController::class, 'logout'])->name('login.logout');

// Admin
Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
