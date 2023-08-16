<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Models\Page;

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
  // Pages
  // Route::get('pages/sub/{slug}', function (string $item) {
  //   return Page::where('slug', $item)->get();
  // })->name('pages.subpage');
  Route::controller(PageController::class)->group(function() {
    // Gallery
    Route::post('/pages/gallery', 'storeGallery')->name('pages.gallery.store');
  });
  Route::resource('/pages', PageController::class);
});
