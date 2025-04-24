<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\NoticesController;
use App\Http\Controllers\Api\DownloadsController;
use App\Http\Controllers\Api\ResultsController;
use App\Http\Controllers\Api\AcademicsController;
use App\Http\Controllers\Api\SchoolDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/academics_details', [AcademicsController::class, 'index'])->name('academics_details.index');
Route::get('/academics_details/{slug}', [AcademicsController::class, 'show']);
Route::get('/images', [GalleryController::class, 'index'])->name('images.index');
Route::get('/images/{slug}', [GalleryController::class, 'show']);
Route::get('/results', [ResultsController::class, 'index'])->name('results.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show']);
Route::get('/notices', [NoticesController::class, 'index'])->name('notices.index');
Route::get('/downloads', [DownloadsController::class, 'index'])->name('downloads.index');
Route::get('/school_details', [SchoolDetailsController::class, 'index'])->name('school_details.index');

