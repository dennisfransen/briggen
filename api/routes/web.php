<?php

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

Route::get('login/{provider}', 'AuthController@redirectToProvider')->name('login.provider.redirect');
Route::get('login/facebook/callback', 'AuthController@facebookCallback')->name('login.facebook.callback');
Route::get('login/twitter/callback', 'AuthController@twitterCallback')->name('login.twitter.callback');
Route::get('login/google/callback', 'AuthController@googleCallback')->name('login.google.callback');

Route::get('/', function () {
    return view('welcome');
});