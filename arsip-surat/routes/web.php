<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;

Route::resource('kategoris', KategoriController::class);
Route::get('/kategoris', [KategoriController::class, 'index'])->name('kategoris.index');
Route::resource('surats', SuratController::class);
Route::view('/about', 'about')->name('about');;
Route::get('/', function () {
    return view('welcome');
});

