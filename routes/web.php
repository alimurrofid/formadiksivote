<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/vote', [UserController::class, 'userVote'])->name('user.vote');
    Route::post('/vote-candidate', [UserController::class, 'voteCandidate'])->name('vote.candidate');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard.home');
        })->name('dashboard.home');
        Route::resource('/candidate', CandidateController::class);
        Route::resource('/user', UserController::class);
        Route::post('/import-users', [UserController::class, 'importUsers'])->name('user.import-users');
        Route::post('/user/delete-all', [UserController::class, 'deleteAll'])->name('user.delete-all');
        Route::post('/user/reset-all', [UserController::class, 'resetAll'])->name('user.reset-all');
        Route::post('/user/reset/{user}', [UserController::class, 'reset'])->name('user.reset');
    });
    Route::post('tmp-upload', [CandidateController::class, 'tmpUpload']);
    Route::delete('tmp-delete', [CandidateController::class, 'tmpDelete']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');