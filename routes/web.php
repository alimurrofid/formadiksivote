<?php

use Illuminate\Support\Facades\Route;
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
    Route::post('/candidate/delete-all', [CandidateController::class, 'deleteAll'])->name('candidate.delete-all');
});
Route::post('tmp-upload', [CandidateController::class, 'tmpUpload']);
Route::delete('tmp-delete', [CandidateController::class, 'tmpDelete']);
