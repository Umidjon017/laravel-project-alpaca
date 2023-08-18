<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoBlockController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TextBlockController;
use App\Http\Controllers\Admin\VideoPlayerController;
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
    Route::resource('/pages', PageController::class);
    // Gallery
    Route::resource('/gallery', GalleryController::class)->only('store');
    // Info Block
    Route::get('/{slug}/infos/create', [InfoBlockController::class, 'create'])->name('infos.create');
    Route::resource('/infos', InfoBlockController::class)->only('store', 'edit', 'update', 'destroy');
    // Comments
    Route::get('/{slug}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::resource('/comments', CommentController::class)->only('store', 'edit', 'update', 'destroy');
    // Text Block
    Route::get('/{slug}/texts/create', [TextBlockController::class, 'create'])->name('texts.create');
    Route::resource('/texts', TextBlockController::class)->only('store', 'edit', 'update', 'destroy');
    // Video Player
    Route::get('/{slug}/videos/create', [VideoPlayerController::class, 'create'])->name('videos.create');
    Route::resource('/videos', VideoPlayerController::class)->only('store', 'edit', 'update', 'destroy');
    // Our Clients
    Route::get('/{slug}/clients/create', [OurClientController::class, 'create'])->name('clients.create');
    Route::resource('/clients', OurClientController::class)->only('store', 'edit', 'update', 'destroy');
});
