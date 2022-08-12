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
Route::get('login', [AuthController::class, 'getLogin'])->name('admin-login');
Route::post('login', [AuthController::class, 'getLogin'])->name('admin-login-post');

Route::group(['middleware' => ['admin.auth'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'home'])->name('dashboard');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('list', [ListController::class, 'list'])->name('list');
    Route::match(['GET', 'POST'], 'add', [ListController::class, 'add'])->name('add');
    Route::match(['GET', 'POST'], 'edit/{id}', [ListController::class, 'add'])->name('edit');
    Route::match(['DELETE'], 'delete/{id?}', [ListController::class, 'delete'])->name('delete');
});
