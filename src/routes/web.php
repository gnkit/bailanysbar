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
    Route::get('/dashboard', [\App\Http\Controllers\Account\AccountController::class, 'dashboard'])->name('dashboard');
    Route::get('/setting', [\App\Http\Controllers\Account\AccountController::class, 'setting'])->name('setting');
    Route::group(['middleware' => 'role:manager'], function () {
        Route::resource('/users', 'App\Http\Controllers\Account\UserController');
        Route::resource('/permissions', 'App\Http\Controllers\Account\Permission\PermissionController')->except('show');
        Route::resource('/roles', 'App\Http\Controllers\Account\Role\RoleController')->except('show');
        Route::resource('/categories', 'App\Http\Controllers\Link\Category\CategoryController')->except('show');
    });
    Route::resource('/contacts', 'App\Http\Controllers\Link\Contact\ContactController');
});
