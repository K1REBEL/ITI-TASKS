<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome'); });

Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::get('users/store', [UserController::class, 'store'])->name('users.store');
// Route::post('store', [UserController::class, 'store'])->name('users.store');

Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
// Route::delete('users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

/////////////////////////////////////////////////////////////

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
// Route::delete('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');


// Route::resource('posts', PostController::class);
Route::fallback(function(){ return redirect('/'); });

