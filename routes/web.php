<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentController;
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

Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
Route::resource('rent',RentController::class);
Route::get('/history',[DashboardController::class,'history'])->name('admin.history');
Route::get('/login',[LoginRegisterController::class, 'login'])->name('login');
Route::get('/register',[LoginRegisterController::class, 'register'])->name('register');
Route::get('/logout',[LoginRegisterController::class, 'logout']);
Route::post('store',[LoginRegisterController::class, 'storeUser'])->name('store');
Route::post('auth',[LoginRegisterController::class, 'auth'])->name('auth');
