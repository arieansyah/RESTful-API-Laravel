<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function () {

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');

    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::prefix('post')->group(function () {
            Route::get('/', 'PostController@index');
            Route::post('store', 'PostController@store');
            Route::post('update/{id}', 'PostController@update');
            Route::post('delete/{id}', 'PostController@destroy');
        });

        Route::prefix('comment')->group(function () {
            Route::post('store', 'CommentController@store');
            Route::get('show', 'CommentController@show');
            // Route::post('update/{id}', 'CommentController@update');
            // Route::post('delete/{id}', 'CommentController@destroy');
        });
    });
});
