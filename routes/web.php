<?php

use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoBlockController;
use App\Http\Controllers\Admin\PageController;
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
    Route::resource('/gallery', GalleryController::class);
    Route::get('/infos/create/{id}', [InfoBlockController::class, 'create'])->name('infos.create');
    Route::resource('/infos', InfoBlockController::class)->only('index', 'store');
    // Pages
    // Route::get('pages/sub/{slug}', function (string $item) {
    //   return Page::where('slug', $item)->get();
    // })->name('pages.subpage');
    Route::resource('/pages', PageController::class);
});
