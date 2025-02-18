<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepliesController;

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

Route::prefix('admin')->group(function(){
    Route::resource('users',UserController::class);
    Route::resource("posts",postController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('replies', RepliesController::class);
    Route::get('trashed/users', [UserController::class, 'trashed'])->name('users.trashed');
    // Route::delete('users/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
    // Route::delete('users/{13}/delete', [UserController::class, 'deleteUser'])->name('users.delete');


});
require __DIR__.'/auth.php';
