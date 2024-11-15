<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
});

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::get('log', [LoginController::class, 'log'])->name('login.log');

Route::get('register', [LoginController::class, 'register'])->name('login.register');
Route::post('reg', [LoginController::class, 'reg'])->name('login.reg');

Route::get('home',[LoginController::class, 'home'])->name('home');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
