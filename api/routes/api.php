<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix("v1")->group(
    function () {
        Route::middleware(["guest"])->group(
            function () {
                Route::post(
                    "/register",
                    "AuthController@register"
                )->name("register");
                Route::post(
                    "/login",
                    "AuthController@login"
                )->name("login");
                Route::post(
                    "/login/facebook",
                    "AuthController@facebookLogin"
                )->name("login.facebook");

                Route::resource("corporations", "CorporationController")->only(["store", "show", "update"]);

                Route::resource("stamps", "StampController")->only(["show"]);
                Route::put("/stamps/{stamp}/consume", "StampController@consume")
                    ->name("stamps.consume");

                Route::resource("vouchers", "VoucherController")->only(["store"]);
                Route::put("/vouchers/consume", "VoucherController@consume")
                    ->name("vouchers.consume");
            }
        );

        Route::middleware(["auth:api"])->group(
            function () {
                Route::get('/users/{user}', 'AuthController@view')->name('users.view');

                Route::post(
                    "/logout",
                    "AuthController@logout"
                )->name("logout");
            }
        );
    }
);