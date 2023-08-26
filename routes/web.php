<?php

use App\Http\Controllers\Admin\AppealController;
use App\Http\Controllers\Admin\AppealFormController;
use App\Http\Controllers\Admin\CheckboxBlockController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DirectSpeechController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoBlockController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Admin\OurClientLogoController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RecommendationBlockController;
use App\Http\Controllers\Admin\TextBlockController;
use App\Http\Controllers\Admin\VideoPlayerController;
use App\Http\Controllers\Front\BannerController;
use App\Http\Controllers\Front\FeedbackController;
use App\Http\Controllers\Front\ForDoctorController;
use App\Http\Controllers\Front\ForItController;
use App\Http\Controllers\Front\ForLeaderController;
use App\Http\Controllers\Front\ForMarketologyController;
use App\Http\Controllers\Front\MenuController;
use App\Http\Controllers\Front\OurPartnerLogoController;
use App\Http\Controllers\Front\OurPhilosophyController;
use App\Http\Controllers\Front\RecommendationController;
use App\Http\Controllers\HomeController;
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

Route::get('/locale/{locale}', function ($locale){
   session(['locale_id' => $locale]);
   return back();
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/page/{slug}', [HomeController::class, 'page'])->name('home.page');

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    // Localization
    Route::resource('/localizations', LocalizationController::class)->except('create', 'edit', 'show');
    // Pages
    Route::resource('/pages', PageController::class);
    // Info Block
    Route::get('/{id}/infos/create', [InfoBlockController::class, 'create'])->name('infos.create');
    Route::get('/{id}/infos/show', [InfoBlockController::class, 'show'])->name('infos.show');
    Route::resource('/infos', InfoBlockController::class)->except('index', 'create', 'show');
    // Comments
    Route::get('/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::get('/{id}/comments/show', [CommentController::class, 'show'])->name('comments.show');
    Route::resource('/comments', CommentController::class)->except('index', 'create', 'show');
    // Our Clients
    Route::get('/{id}/clients/create', [OurClientController::class, 'create'])->name('clients.create');
    Route::get('/{id}/clients/show', [OurClientController::class, 'show'])->name('clients.show');
    Route::resource('/clients', OurClientController::class)->except('index', 'create', 'show');
    // Our Clients Logo
    Route::resource('/clients_logo', OurClientLogoController::class)->only('store', 'update', 'destroy');
    // Text Block
    Route::get('/{id}/texts/create', [TextBlockController::class, 'create'])->name('texts.create');
    Route::get('/{id}/texts/show', [TextBlockController::class, 'show'])->name('texts.show');
    Route::resource('/texts', TextBlockController::class)->except('index', 'create', 'show');
    // Checkbox Block
    Route::get('/{id}/checkbox/create', [CheckboxBlockController::class, 'create'])->name('checkbox.create');
    Route::get('/{id}/checkbox/show', [CheckboxBlockController::class, 'show'])->name('checkbox.show');
    Route::resource('/checkbox', CheckboxBlockController::class)->except('index', 'create', 'show');
    // Gallery
    Route::resource('/gallery', GalleryController::class)->except('index', 'create', 'edit');
    // Video Player
    Route::get('/{id}/videos/create', [VideoPlayerController::class, 'create'])->name('videos.create');
    Route::get('/{id}/videos/show', [VideoPlayerController::class, 'show'])->name('videos.show');
    Route::resource('/videos', VideoPlayerController::class)->except('index', 'create', 'show');
    // Direct Speech
    Route::get('/{id}/direct_speech/create', [DirectSpeechController::class, 'create'])->name('direct_speech.create');
    Route::get('/{id}/direct_speech/show', [DirectSpeechController::class, 'show'])->name('direct_speech.show');
    Route::resource('/direct_speech', DirectSpeechController::class)->except('index', 'create', 'show');
    // Appeals
    Route::get('/{id}/appeals/create', [AppealController::class, 'create'])->name('appeals.create');
    Route::get('/{id}/appeals/show', [AppealController::class, 'show'])->name('appeals.show');
    Route::resource('/appeals', AppealController::class)->except('create', 'show');
    // Appeal Form
    Route::Resource('/appeal_form', AppealFormController::class)->except('show');
    // Recommendation Block
    Route::get('/{id}/recommendation-block/create', [RecommendationBlockController::class, 'create'])->name('recommendation-block.create');
    Route::get('/{id}/recommendation-block/show', [RecommendationBlockController::class, 'show'])->name('recommendation-block.show');
    Route::resource('/recommendation-block', RecommendationBlockController::class)->except('index', 'create', 'show');

    // For Frontend
    Route::resource('/banners', BannerController::class)->except('show');
    Route::resource('/philosophy', OurPhilosophyController::class)->except('show');
    Route::resource('/doctors', ForDoctorController::class)->except('show');
    Route::resource('/leaders', ForLeaderController::class)->except('show');
    Route::resource('/it', ForItController::class)->except('show');
    Route::resource('/marketology', ForMarketologyController::class)->except('show');
    Route::resource('/feedback', FeedbackController::class)->except('show');
    Route::resource('/partners', OurPartnerLogoController::class)->except('show');
    Route::resource('/recommendations', RecommendationController::class)->except('show');
    Route::resource('/menus', MenuController::class)->except('show');
});
