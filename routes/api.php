<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rifrocket\LaravelCmsV2\Models\LbsAdmin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return LbsAdmin::first();
});
