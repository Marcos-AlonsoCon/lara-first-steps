<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/',[TestController::class,'test']);

Route::get('/custom', function () {

    // SENDING PARAM TO custom.blade.php
    $msg = "Message from server";
    $anothermsg = "Anothe message from server";
    // SENDING PARAM TO custom.blade.php VIA VARIABLE
    $data = ['age' => 22];

    return view('custom', ['msg' => $msg, 'anothermsg' => $anothermsg]);
    // GIVING NAME TO THE ROUTE
})->name('custom');


Route::get('/contactme', function () {
    return "Contact me";
     // GIVING NAME TO THE ROUTE
     // NAMES ALLOW THE ROUTES TO CHANGE
})->name('contact');