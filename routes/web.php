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
Route::get('/base', function () {
    return view('base');
});
Route::get('/base_pdf', function () {
    return PDF::loadView('base')->inline();
});
Route::get('/hello', function () {
    return PDF::loadHTML('<h1>Hello!</h1>')->inline();
});

// Route::get('hanko_canvas', 'HankoController@canvasHanko');

Route::get('/hanko_canvas', function () {
    return view('hanko_canvas');
});

Route::get('/hanko_pdf', function () {
    // $member = Faker\Factory::create('ja_JP');
    return PDF::loadView('hanko')->inline();
});

Route::get('/hanko_image_pdf', function () {
    // $member = Faker\Factory::create('ja_JP');
    return PDF::loadView('hanko_image')->inline();
});

Route::post('/phantommagick', function(){
    // base_path() is //"C:\xampp\htdocs\careertag"
       $conv = new \Anam\PhantomMagick\Converter();
       $conv->make('https://google.com')
           ->setBinary(base_path() . "/phantomjs-2.0.0-windows/bin/phantomjs.exe")
           ->toPdf()
           ->download('google.pdf');
   
   });
