<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('dashboard')->group (function () {
    Route::get('/', function () {
        return view('dashboard.home');
    })->name('dashboard.home');

    Route::get('/kandidat', function () {
        return view('dashboard.kandidat');
    })->name('dashboard.kandidat');
    Route::get('/user', function () {
        return view('dashboard.user');
    })->name('dashboard.user');
    Route::get('/kandidat', function () {
        return view('dashboard.kandidat');
    })->name('dashboard.kandidat');
});