<?php

use App\Http\Controllers\FrontAuthController;
use App\Http\Controllers\HomeController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rifrocket\LaravelCmsV2\Models\LbsAdmin;
use Rifrocket\LaravelCmsV2\Models\LbsAppSetting;
use Rifrocket\LaravelCmsV2\Models\LbsOtpValidator;

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

Route::GET('/', [HomeController::class, 'property_landing_page'])->name('public.property_landing_page');
Route::GET('/search-map', [HomeController::class, 'map_search'])->name('public.property.map_search');
Route::GET('/property-details', [HomeController::class, 'property_details'])->name('public.property.property_details');
Route::GET('/city-videos', [HomeController::class, 'city_videos'])->name('public.property.city_videos');
Route::GET('/city-info', [HomeController::class, 'city_info'])->name('public.property.city_info');
Route::GET('/news', [HomeController::class, 'city_news'])->name('public.property.city_news');
Route::GET('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('public.property.privacy_policy');
Route::GET('/terms-condition', [HomeController::class, 'terms_condition'])->name('public.property.terms_condition');


Route::prefix('auth')->group(function() {

    Route::prefix('socialite')->group(function() {

        Route::get('/google-redirect', [FrontAuthController::class,'google_redirect'])->name('auth.socialite.google.redirect');
        Route::get('/google-callback', [FrontAuthController::class,'google_callback'])->name('auth.socialite.google.callback');

        Route::get('/facebook-redirect', [FrontAuthController::class,'facebook_redirect'])->name('auth.socialite.facebook.redirect');
        Route::get('/facebook-callback', [FrontAuthController::class,'facebook_callback'])->name('auth.socialite.facebook.callback');

        Route::get('/linkedin-redirect', [FrontAuthController::class,'linkedin_redirect'])->name('auth.socialite.linkedin.redirect');
        Route::get('/linkedin-callback', [FrontAuthController::class,'linkedin_callback'])->name('auth.socialite.linkedin.callback');


        Route::get('/destroy-user-social-link', [FrontAuthController::class,'destroy_user_social_link'])->name('auth.socialite.destroy.socialite');
    });

    Route::get('/registration', [FrontAuthController::class,'user_registration'])->name('auth.user_registration');
    Route::get('/Login-in', [FrontAuthController::class,'Login_in'])->name('auth.Login_in');
    Route::get('/Log-out', [FrontAuthController::class,'logout'])->name('auth.logout');


});

Route::prefix('authorized')->middleware('auth')->group(function() {

    Route::get('/user-dashboard', [FrontAuthController::class,'user_dashboard'])->name('authorized.user.dashboard');

    Route::get('/user-make-favorite', [FrontAuthController::class,'user_make_favorite'])->name('authorized.user.make_favorite');
    Route::get('/user-favorite', [FrontAuthController::class,'user_favorite'])->name('authorized.user.favorite');

});




