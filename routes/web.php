<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;

Route::get('login',[logincontroller::class,'login'])->name('login');

Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('animo',[logincontroller::class,'animo'])->name('animo');

Route::get('organizador',[logincontroller::class,'organizador'])->name('organizador');

Route::get('mood',[logincontroller::class,'mood'])->name('mood');
Route::get('calendar',[logincontroller::class,'calendar'])->name('calendar');