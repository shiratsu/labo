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
Route::get('hanko', 'HankoController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return PDF::loadHTML('<h1>Hello!</h1>')->inline();
});

Route::get('/hanko_pdf', function () {
    // $member = Faker\Factory::create('ja_JP');
    return PDF::loadView('hanko')->inline();
});

Route::get('/hanko_image_pdf', function () {
    // $member = Faker\Factory::create('ja_JP');
    return PDF::loadView('hanko_image')->inline();
});
