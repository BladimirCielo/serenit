<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\moodcontroller;

Route::get('login',[logincontroller::class,'login'])->name('login');
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');

Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('mood',[moodcontroller::class,'mood'])->name('mood');

Route::get('organizador',[logincontroller::class,'organizador'])->name('organizador');
Route::get('calendar',[logincontroller::class,'calendar'])->name('calendar');
