<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Tour\HomeController;
use App\Http\Controllers\Tour\ReserveController;
use App\Http\Controllers\Tour\SingleController;
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

Route::any('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/tour/{id}', [SingleController::class, 'index'])->name('tour_single');

Route::any('/reserve/{id}', [ReserveController::class, 'index'])->name('reserve');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
Route::any('/profile', [LoginController::class, 'profile'])->name('profile');
