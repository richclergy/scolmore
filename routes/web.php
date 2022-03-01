<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;

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

Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::get('/register', [IndexController::class, 'register'])->name('register');
Route::post('/register', [IndexController::class, 'storeuser']);
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::post('/login', [IndexController::class, 'dologin']);
Route::get('/sendmail', [MailController::class, 'sendmail'])->name('sendmail');
Route::post('/sendmail', [MailController::class, 'storemail']);
Route::get('/view-logs', [UserController::class, 'logs'])->name('view-logs');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
