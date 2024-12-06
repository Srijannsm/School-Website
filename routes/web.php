<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolDetailsController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //school Details
    Route::get('school_details', [SchoolDetailsController::class, 'index'])->name('school_details.index');
    Route::get('school_details/{id}/edit', [SchoolDetailsController::class, 'edit'])->name('school_details.edit');
    Route::put('school_details/{id}', [SchoolDetailsController::class, 'update'])->name('school_details.update');
    // Route::delete('school_details/{id}', [SchoolDetailsController::class, 'destroy'])->name('school_details.destroy');
});
