<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoBlockController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CommentController;
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
});

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    // Localization
    Route::resource('/localizations', LocalizationController::class)->except('create', 'edit', 'show');
    // Pages
    // Route::get('pages/sub/{slug}', function (string $item) {
    //   return Page::where('slug', $item)->get();
    // })->name('pages.subpage');
    Route::resource('/pages', PageController::class);
    // Gallery
    Route::resource('/gallery', GalleryController::class)->only('store');
    // Info Block
    Route::get('/infos/create/{id}', [InfoBlockController::class, 'create'])->name('infos.create');
    Route::resource('/infos', InfoBlockController::class)->only('create', 'store');
    // Comments
    Route::get('/comments/create/{id}', [CommentController::class, 'create'])->name('comments.create');
    Route::resource('/comments', CommentController::class)->only('create', 'store');
});
