<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}/', [\App\Http\Controllers\Home\HomeController::class, 'category']);

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Account\DashboardController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => 'role:manager'], function () {
        Route::resource('/users', 'App\Http\Controllers\Account\UserController');
    });
});
