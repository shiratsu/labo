<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anam\PhantomMagick\Converter;
use Spatie\Browsershot\Browsershot;


class HankoController extends Controller
{
    //
    public function index ()
    {

        return view('hanko');
    }

    public function canvasHanko ()
    {
        // $conv = new Converter();
        // $html =  \View::make('base')->render();

        // // Browsershot::url('https://labo.test/base')
        // //     // ->setScreenshotType('jpeg', 100)
        // //     ->save("/tmp/hiratsuka.png");

        // return response(Browsershot::url('https://labo.test/base')->fullpage())->header('Content-type','image/png');
        
    }
}
