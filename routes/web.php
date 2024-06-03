<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibraryController;

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
// Rota Autenticação
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class,'index'])->name('home');

// Rotas Usuário
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');
Route::post('/users/{user}', [UserController::class,'show'])->name('users.show');
Route::post('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.updtate');
Route::delete('', [UserController::class,'destroy'])->name('users.destroy');

// Rotas Livros
Route::get('/library', [LibraryController::class,'index'])->name('library.index');
Route::get('/library/create', [LibraryController::class,'create'])->name('library.create');
Route::get('/library/{book}/edit', [LibraryController::class,'edit'])->name('library.edit');
Route::get('/library/{book}', [LibraryController::class,'show'])->name('library.show');
Route::post('/library', [LibraryController::class,'store'])->name('library.store');
Route::put('/library/{book}', [LibraryController::class,'update'])->name('library.update');
Route::delete('/library/{book}', [LibraryController::class,'destroy'])->name('library.destroy');