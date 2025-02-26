<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepliesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
Route::group(["prefix"=>"admin","middleware"=>"auth"], function(){
    Route::resource('users', UserController::class);
    Route::resource("posts", postController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('replies', RepliesController::class);
    Route::prefix('user')->group(function () {
        Route::get('trashed', [UserController::class, 'trashed'])->name('users.trashed');
        Route::delete('{id}/forcedelete', [UserController::class, 'forceDelete'])->name('users.forcedelete');
        Route::patch('{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    });
});

    // Route::middleware('auth')->prefix('admin')->group(function () {
    //     Route::resource('users', UserController::class);
    //     Route::resource("posts", postController::class);
    //     Route::resource('comments', CommentController::class);
    //     Route::resource('replies', RepliesController::class);
    //     Route::prefix('user')->group(function () {
    //         Route::get('trashed', [UserController::class, 'trashed'])->name('users.trashed');
    //         Route::delete('{id}/forcedelete', [UserController::class, 'forceDelete'])->name('users.forcedelete');
    //         Route::patch('{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    //     });
    // });

});
require __DIR__ . '/auth.php';
