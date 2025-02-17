<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.pages.formpesanan');
});

Route::get('/data/penumpang', function () {
    return view('frontend.pages.formpenumpang');
});

Route::get('/last', function () {
    return view('frontend.pages.halamanterakhir');
});

Route::get('/contact-us', function () {
    return view('frontend.pages.contactus');
});
