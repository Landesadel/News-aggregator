<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\AddNewsController;
use App\Http\Controllers\SigningController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/signin', [SigningController::class, 'index']);

Route::get('/add', [AddNewsController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{$id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('article');
