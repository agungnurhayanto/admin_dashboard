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

/* Route::get('/', function () {
    return view('dashboard');
}); */

Route::get('/dashboard', function(){
    return view('dashboard_utama');
});

Route::get('dashboard/login', function(){
    return view('login');
});

Route::get('kategori', function(){
    return view('kategori');
});

Route::get('article', function(){
    return view('article');
});

Route::get('pages', function(){
    return view('pages');
});