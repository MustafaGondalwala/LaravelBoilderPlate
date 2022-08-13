<?php

namespace App\Http\Controllers\Admin;

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

Route::get('', [AuthController::class, 'redirectToLogin']);
Route::get('login', [AuthController::class, 'getLogin'])->name('admin.login');
Route::post('login', [AuthController::class, 'getLogin'])->name('admin-login-post');

Route::group(['middleware' => ['admin.auth'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('list', [ListController::class, 'list'])->name('list');
    Route::get('add/{admin?}', [ListController::class, 'add'])->name('add');
    Route::post('add/{admin?}', [ListController::class, 'store'])->name('store');
    Route::match(['DELETE'], 'delete/{admin?}', [ListController::class, 'delete'])->name('delete');

    Route::group(['prefix' => 'component', 'as' => 'component.'], function () {
        Route::match(['GET', 'POST'], 'list', [ComponentController::class, 'list'])->name('list');
        Route::get('add/{component?}', [ComponentController::class, 'add'])->name('add');
        Route::post('add/{component?}', [ComponentController::class, 'store'])->name('store');
        Route::delete('delete/{component?}', [ComponentController::class, 'delete'])->name('delete');
    });
});
