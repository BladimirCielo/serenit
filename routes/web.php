<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\TerapiasController;



Route::get('login',[logincontroller::class,'login'])->name('login');

Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('animo',[logincontroller::class,'animo'])->name('animo');


Route::get('/recursos', [RecursosController::class, 'recursos'])->name('recursos.serenit');
Route::get('/terapias', [TerapiasController::class, 'terapia'])->name('terapias');

