<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::get('/home', [FrontController::class, 'index'])->name('index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/webdesign', [FrontController::class, 'webdesign'])->name('webdesign');
Route::get('/webdevelopment', [FrontController::class, 'webdevelopment'])->name('webdevelopment');
Route::get('/digitalmarketing', [FrontController::class, 'digitalmarketing'])->name('digitalmarketing');
Route::get('/graphicdesigning', [FrontController::class, 'graphicdesigning'])->name('graphicdesigning');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('*', [FrontController::class, 'contact'])->name('index');