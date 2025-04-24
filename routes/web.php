<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\AcademicsController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    //users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    // Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('users/{id}/update', [UserController::class, 'update'])->name('users.update');
    // Route::get('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    //school Details
    Route::get('school_details', [SchoolDetailsController::class, 'index'])->name('school_details.index');
    Route::get('school_details/{id}/edit', [SchoolDetailsController::class, 'edit'])->name('school_details.edit');
    Route::put('school_details/{id}', [SchoolDetailsController::class, 'update'])->name('school_details.update');
    // Route::delete('school_details/{id}', [SchoolDetailsController::class, 'destroy'])->name('school_details.destroy');
    
    //academics
    Route::get('academics', [AcademicsController::class, 'index'])->name('academics.index');
    Route::get('academics/create', [AcademicsController::class, 'create'])->name('academics.create');
    Route::post('academics', [AcademicsController::class, 'store'])->name('academics.store');
    Route::get('academics/{id}/edit', [AcademicsController::class, 'edit'])->name('academics.edit');
    Route::get('academics/{slug}', [AcademicsController::class, 'show']);
    Route::put('academics/{id}/update', [AcademicsController::class, 'update'])->name('academics.update');
    Route::get('academics/{id}/delete', [AcademicsController::class, 'destroy'])->name('academics.destroy');
    
    //gallery
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{slug}', [GalleryController::class, 'show']);
    // Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    // Route::put('gallery/{id}/update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('gallery/{id}/delete', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    
    //news
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{slug}', [NewsController::class, 'show']);
    Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{id}/update', [NewsController::class, 'update'])->name('news.update');
    // Route::get('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('news/{id}/delete', [NewsController::class, 'destroy'])->name('news.destroy');

    
    //notices
    Route::get('notices', [NoticesController::class, 'index'])->name('notices.index');
    Route::get('notices/create', [NoticesController::class, 'create'])->name('notices.create');
    Route::post('notices', [NoticesController::class, 'store'])->name('notices.store');
    Route::get('notices/{id}/edit', [NoticesController::class, 'edit'])->name('notices.edit');
    Route::put('notices/{id}/update', [NoticesController::class, 'update'])->name('notices.update');
    Route::get('notices/{id}', [NoticesController::class, 'destroy'])->name('notices.destroy');
    Route::get('notices/{id}/download', [NoticesController::class, 'download'])->name('notices.download');

    //results
    Route::get('results', [ResultsController::class, 'index'])->name('results.index');
    Route::get('results/create', [ResultsController::class, 'create'])->name('results.create');
    Route::post('results', [ResultsController::class, 'store'])->name('results.store');
    Route::get('results/{id}/edit', [ResultsController::class, 'edit'])->name('results.edit');
    Route::put('results/{id}/update', [ResultsController::class, 'update'])->name('results.update');
    Route::get('results/{id}', [ResultsController::class, 'destroy'])->name('results.destroy');
    Route::get('results/{id}/download', [ResultsController::class, 'download'])->name('results.download');
    
    //downloads
    Route::get('downloads', [DownloadsController::class, 'index'])->name('downloads.index');
    Route::get('downloads/create', [DownloadsController::class, 'create'])->name('downloads.create');
    Route::post('downloads', [DownloadsController::class, 'store'])->name('downloads.store');
    Route::get('downloads/{id}/edit', [DownloadsController::class, 'edit'])->name('downloads.edit');
    Route::put('downloads/{id}/update', [DownloadsController::class, 'update'])->name('downloads.update');
    Route::get('downloads/{id}', [DownloadsController::class, 'destroy'])->name('downloads.destroy');
    Route::get('downloads/{id}/download', [DownloadsController::class, 'download'])->name('downloads.download');


});
