<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/items', function () {
    return view('items.index');
})->middleware(['auth', 'verified'])->name('items');

Route::resource('items', ItemController::class)->middleware(['auth', 'verified']);

Route::get('/search', 'ItemController@search')->name('search');

Route::get('/boxes', function () {
    return view('boxes.index');
})->middleware(['auth', 'verified'])->name('boxes');

Route::resource('boxes', BoxController::class)->middleware(['auth', 'verified']);

Route::get('/loans', function () {
    return view('loans.index');
})->middleware(['auth', 'verified'])->name('loans');

Route::resource('loans', LoanController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
