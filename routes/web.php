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

Route::get('/', function () {
    Crew\Unsplash\HttpClient::init([
        'applicationId' => '1cb9ad15174c1e797d4e678889426548163d966407bf71770c0de479a2a09d72',
        'utmSource' => 'Code Deploy'
    ]);

    $img = Crew\Unsplash\Photo::random();
    $image = [
        'full' => $img->urls['regular'],
    ];
    return view('welcome', compact('image'));
});

Route::post('generate', function () {


});
