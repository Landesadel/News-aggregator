<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Form\CallBackController;
use App\Http\Controllers\Form\OrderDataUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\AddNewsController;
use App\Http\Controllers\SigningController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/signin', [SigningController::class, 'index']);

Route::group(['prefix' => 'form', 'as' => 'form.'], static function() {
    Route::post('/upload', OrderDataUploadController::class)
        ->name('upload');
    Route::post('/callback', CallBackController::class)
        ->name('callback');
});


//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', [IndexController::class, 'index'])
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

//News routes
Route::get('/category/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}/{category}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('article');
Route::get('/add', [AddNewsController::class, 'index']);
