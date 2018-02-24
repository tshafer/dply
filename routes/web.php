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


Route::domain('dply.io')->group(function () {
    Route::get('/', 'ShortCode@index');
    Route::post('/', 'ShortCode@store');

    Route::get('{url}', 'ShortCode@redirect')->where(['url' => '[a-zA-Z0-9]+']);
    Route::get('{url}/stats', 'ShortCode@stats')->where(['url' => '[a-zA-Z0-9]+']);
});
// Route::domain('dply.io')->group(function () {
//     Route::get('/', 'Headers@index');
//     Route::post('/', 'Headers@store');
// }
