<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('kategori', [CategoryController::class, 'index']);

Route::get('article', function(){
    return view('dashboard/article');
});

Route::get('pages', function(){
    return view('dashboard/pages');
});

Route::get('pengguna', function(){
    return view('dashboard/pengguna');
});

Route::get('pengaturan', function(){
    return view('dashboard/pengaturan');
});

Route::get('profil', function(){
    return view('dashboard/profil');
});

Route::get('ganti_password', function(){
    return view('dashboard/ganti_password');
});
