<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidateController;

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
    Route::get('/user', function () {
        return view('dashboard.user');
    })->name('dashboard.user');
    Route::get('/kandidat', function () {
        return view('dashboard.kandidat');
    })->name('dashboard.kandidat');
    Route::resource('/candidate', CandidateController::class);
    Route::resource('/user', UserController::class);
    Route::post('/import-users', [UserController::class, 'importUsers'])->name('user.import-users');
    Route::post('/user/delete-all', [UserController::class, 'deleteAll'])->name('user.delete-all');
    Route::post('/user/reset-all', [UserController::class, 'resetAll'])->name('user.reset-all');
    Route::post('/user/reset/{user}', [UserController::class, 'reset'])->name('user.reset');

});
Route::post('tmp-upload', [CandidateController::class, 'tmpUpload']);
Route::delete('tmp-delete', [CandidateController::class, 'tmpDelete']);
