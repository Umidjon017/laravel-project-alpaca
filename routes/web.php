<?php

use App\Http\Controllers\Admin\AppealController;
use App\Http\Controllers\Admin\CheckboxBlockController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DirectSpeechController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoBlockController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\OurClientLogoController;
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
    return view('layout.front');
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
    Route::resource('/gallery', GalleryController::class)->only('store', 'update', 'destroy');
    // Info Block
    Route::get('/{id}/infos/create', [InfoBlockController::class, 'create'])->name('infos.create');
    Route::resource('/infos', InfoBlockController::class)->only('store', 'edit', 'update', 'destroy');
    // Comments
    Route::get('/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::resource('/comments', CommentController::class)->only('store', 'edit', 'update', 'destroy');
    // Text Block
    Route::get('/{id}/texts/create', [TextBlockController::class, 'create'])->name('texts.create');
    Route::resource('/texts', TextBlockController::class)->only('store', 'edit', 'update', 'destroy');
    // Video Player
    Route::get('/{id}/videos/create', [VideoPlayerController::class, 'create'])->name('videos.create');
    Route::resource('/videos', VideoPlayerController::class)->only('store', 'edit', 'update', 'destroy');
    // Our Clients
    Route::get('/{id}/clients/create', [OurClientController::class, 'create'])->name('clients.create');
    Route::resource('/clients', OurClientController::class)->only('store', 'edit', 'update', 'destroy');
    // Our Clients Logo
    Route::resource('/clients_logo', OurClientLogoController::class)->only('store', 'update', 'destroy');
    // Appeals
    Route::get('/{id}/appeals/create', [AppealController::class, 'create'])->name('appeals.create');
    Route::resource('/appeals', AppealController::class)->only('index', 'store', 'edit', 'update', 'destroy');
    // Direct Speech
    Route::get('/{id}/direct_speech/create', [DirectSpeechController::class, 'create'])->name('direct_speech.create');
    Route::resource('/direct_speech', DirectSpeechController::class)->only('store', 'edit', 'update', 'destroy');
    // Checkbox Block
    Route::get('/{id}/checkbox/create', [CheckboxBlockController::class, 'create'])->name('checkbox.create');
    Route::resource('/checkbox', CheckboxBlockController::class)->only('store', 'edit', 'update', 'destroy');
});
