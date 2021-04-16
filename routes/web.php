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

Route::get('/u/{url}', 'App\Http\Controllers\UrlController@directUrl')->name('visit');

Route::group(['middleware' => 'auth', 'as' => 'admin.'], function() {
    Route::get('dashboard', 'App\Http\Controllers\UrlController@show')->name('dashboard');
});

Route::resource('urls', '\App\Http\Controllers\UrlController')->middleware('auth');

// Created a Route::resource for crud actions
// Route::group(['prefix' => 'url', 'as' => 'url.', 'middleware' => ['auth']], function() {
//     Route::get('index', 'App\Http\Controllers\UrlController@index')->name('index');
//     Route::post('store', 'App\Http\Controllers\UrlController@store')->name('store');
//     Route::put('update', 'App\Http\Controllers\UrlController@update')->name('update');
//     Route::delete('delete', 'App\Http\Controllers\UrlController@delete')->name('delete');
// });



