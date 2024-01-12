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
Route::get('/about', [\App\Http\Controllers\StaticPage\StaticPageController::class, 'about'])->name('about');
Route::get('/guide', [\App\Http\Controllers\StaticPage\StaticPageController::class, 'guide'])->name('guide');
Route::get('/pricing', [\App\Http\Controllers\StaticPage\StaticPageController::class, 'pricing'])->name('pricing');
Route::get('/privacy', [\App\Http\Controllers\StaticPage\StaticPageController::class, 'privacy'])->name('privacy');
Route::get('/sale', [\App\Http\Controllers\StaticPage\StaticPageController::class, 'sale'])->name('sale');

Auth::routes();


Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Account\AccountController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [\App\Http\Controllers\Account\AccountController::class, 'settings'])->name('settings');
    Route::delete('/destroy/{user}', [\App\Http\Controllers\Account\AccountController::class, 'destroy'])->name('destroy');
    Route::group(['middleware' => 'role:manager'], function () {
        Route::resource('/users', 'App\Http\Controllers\Account\UserController');
        Route::resource('/permissions', 'App\Http\Controllers\Account\Permission\PermissionController')->except('show');
        Route::resource('/roles', 'App\Http\Controllers\Account\Role\RoleController')->except('show');
        Route::resource('/categories', 'App\Http\Controllers\Link\Category\CategoryController')->except('show');
        Route::resource('/tickets', 'App\Http\Controllers\Payment\Ticket\TicketController')->except('show');
    });
    Route::resource('/contacts', 'App\Http\Controllers\Link\Contact\ContactController');
    Route::put('/contact/{contact}', [App\Http\Controllers\Link\Contact\ImageUploadContactServiceController::class, 'reset'])->name('contact.image.reset');
});

Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
