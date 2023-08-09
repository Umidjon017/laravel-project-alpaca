<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function () {

  Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
  Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
  Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
  Route::post('/post-store-image', [\App\Http\Controllers\Admin\PostController::class, 'storeImage'])->name('post.storeImage');

  Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);

});

