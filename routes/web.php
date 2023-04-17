<?php

use App\Http\Controllers\ComicController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 1 - CRUD ---> Read ---> Index
Route::get('/comics', [ComicController::class, 'index'])->name('comics.index');

// 2 - CRUD ---> Create
Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');

// 1 - CRUD ---> Read ---> Show
Route::get('/comics/{comic}', [ComicController::class, 'show'])->name('comics.show');

// 2 - CRUD ---> Create ---> Store
Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');

// 3 - CRUD ---> Update ---> Edit
Route::get('/comics/{comic}/edit', [ComicController::class, 'edit'])->name('comics.edit');

// 3 - CRUD ---> Update
Route::put('/comics/{comic}', [ComicController::class, 'update'])->name('comics.update');
