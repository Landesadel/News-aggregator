<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Account\indexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Form\CallBackController;
use App\Http\Controllers\Form\OrderDataUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\AddNewsController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\SigningController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/signin', [SigningController::class, 'index']);

Route::group(['prefix' => 'form', 'as' => 'form.'], static function () {
    Route::post('/upload', OrderDataUploadController::class)
        ->name('upload');
    Route::post('/callback', CallBackController::class)
        ->name('callback');
});

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');

    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        Route::get('/', [IndexController::class, 'index'])
            ->name('index');
        Route::get('/parser', ParserController::class)->name('parser');
        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('source', AdminSourceController::class);
    });
});


//News routes
Route::get('/category/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}/{category}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('article');
Route::get('/add', [AddNewsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], static function () {
    Route::get('auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');
    Route::get('auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
    ->where('driver', '\w+');
});
