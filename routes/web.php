<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
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

Route::get('/dashboard', function () {
    return view('dashboard_utama');
});

Route::get('/dashboard/login', function () {
    return view('login');
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name(
        'kategori.index'
    );
    Route::get('/hapus/{id}', [
        CategoryController::class,
        'kategori_hapus',
    ])->name('kategori.hapus');
    Route::get('/edit/{id}', [
        CategoryController::class,
        'kategori_edit',
    ])->name('kategori.edit');
    Route::put('/update/{id}', [
        CategoryController::class,
        'kategori_update',
    ])->name('kategori.update');
    Route::get('/create', [CategoryController::class, 'create'])->name(
        'kategori.create'
    );
    Route::post('/store', [CategoryController::class, 'store'])->name(
        'kategori.store'
    );
});

Route::group(['prefix' => 'article'], function () {
    Route::get('/', [ArtikelController::class, 'index'])->name('article.index');
    Route::post('/store', [ArtikelController::class, 'store'])->name(
        'article.store'
    );
    Route::put('/update/{id}', [ArtikelController::class, 'update'])->name(
        'article.update'
    );
    Route::get('/hapus/{id}', [
        ArtikelController::class,
        'artikel_hapus',
    ])->name('article.hapus');
});

Route::get('/pages', function () {
    return view('dashboard/pages');
});

Route::get('/pengguna', function () {
    return view('dashboard/pengguna');
});

Route::get('/pengaturan', function () {
    return view('dashboard/pengaturan');
});

Route::get('/profil', function () {
    return view('dashboard/profil');
});

Route::get('/ganti_password', function () {
    return view('dashboard/ganti_password');
});
