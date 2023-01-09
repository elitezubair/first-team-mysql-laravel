<?php


use Illuminate\Support\Facades\Route;
use Rifrocket\LaravelCmsV2\Http\Controllers\AuthController;
use Rifrocket\LaravelCmsV2\Http\Controllers\AuthorizationController;
use Rifrocket\LaravelCmsV2\Http\Controllers\DashboardController;
use Rifrocket\LaravelCmsV2\Http\Controllers\MediaController;
use Rifrocket\LaravelCmsV2\Http\Controllers\ProfileController;
use Rifrocket\LaravelCmsV2\Http\Controllers\SettingController;

if (config('laravel-cms-v2.admin_has_sub_domain')) {
    Route::group(array('domain' => config('laravel-cms-v2.admin_sub_domain').'.'.env('APP_DOMAIN'),'middleware'=>'web'), function () {
        routes();
    });

}else{
    Route::group(array('domain' => env('APP_DOMAIN'),'middleware'=>'web'), function () {
        routes();
    });
}


function routes(){

    // Login, Logout and forget password
    Route::GET('/', [AuthController::class, 'showLoginForm'])->name('lbs.auth.admin.login');
    Route::GET('/logout', [AuthController::class, 'logout'])->name('lbs.auth.admin.logout');
    Route::GET('/forget-password', [AuthController::class, 'forgetPassword'])->name('lbs.auth.admin.forget.password');
    Route::GET('/logout', [AuthController::class, 'logout'])->name('lbs.auth.logout');

    // Dashboard Controller
    Route::GET('/dashboard', [DashboardController::class, 'dashboard'])->name('lbs.admin.dashboard');

    //App Settings route group
    Route::prefix('settings')->group(function () {


        Route::GET('/app-settings', [SettingController::class, 'app_settings'])->name('lbs.setting.app.settings');
        Route::POST('/app-settings-update-ajax', [SettingController::class, 'app_settings_update'])->name('lbs.setting.app.env.settings.update');
        Route::GET('/custom-css-settings', [SettingController::class, 'app_css_settings'])->name('lbs.setting.app.css.settings');
        Route::POST('/custom-css-settings-update-ajax', [SettingController::class, 'app_css_settings_update'])->name('lbs.setting.app.css.settings.update');

    });

    //Media upload route group
    Route::prefix('media-uploads')->group(function () {

        Route::GET('/', [MediaController::class, 'index'])->name('lbs.uploads.index');
        Route::GET('/create', [MediaController::class, 'create'])->name('uploaded-files.create');
        Route::POST('/upload', [MediaController::class, 'upload'])->name('uploaded-files.upload');
        Route::ANY('/find-uploaded-media', [MediaController::class, 'getStorageMedia'])->name('uploaded-files.getStorageMedia');
        Route::POST('/test', [MediaController::class, 'test'])->name('uploaded-files.test');
    });

    //Authorization Roles and Permissions
    Route::prefix('authorization')->group(function () {

        Route::GET('/', [AuthorizationController::class, 'list_role_permission'])->name('lbs.role.permission.list');
    });

    //Profile setting route group
    Route::prefix('user-profile')->group(function () {

        Route::GET('/', [ProfileController::class, 'showProfile'])->name('lbs.profile.user.profile');
    });


    //   Route::fallback([DashboardController::class,'error404']);
      //
      //    Route::GET('/user-login', [LoginController::class, 'showLoginForm'])->name('login');
}

