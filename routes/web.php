<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name(
        'dashboard.index'
    );

    Route::prefix('kategori')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name(
            'kategori.index'
        );
        Route::post('/store', [CategoryController::class, 'store'])->name(
            'kategori.store'
        );

        Route::post('/show/{id}', [CategoryController::class, 'show'])->name(
            'show'
        );

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name(
            'edit'
        );
        Route::post('/destroy/{id}', [CategoryController::class, 'destroy']);

        Route::put('/update/{id}', [CategoryController::class, 'update'])->name(
            'update'
        );
    });

    Route::prefix('article')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])
            ->name('article.index')
            ->middleware('auth'); // menggunakan middleware 'auth'

        Route::post('/store', [ArtikelController::class, 'store'])->name(
            'article.store'
        );

        Route::put('/update/{id}', [ArtikelController::class, 'update'])->name(
            'article.update'
        );

        Route::post('/destroy/{id}', [
            ArtikelController::class,
            'destroy',
        ])->name('article.destroy');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', [PagesController::class, 'index'])->name('pages.index');
        Route::post('/store', [PagesController::class, 'store'])->name(
            'pages.store'
        );
        Route::get('/destroy/{id}', [PagesController::class, 'destroy'])->name(
            'pages.destroy'
        );
        Route::put('/update/{id}', [PagesController::class, 'update'])->name(
            'pages.update'
        );
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
});
