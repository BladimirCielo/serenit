<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\TerapiasController;
use App\Http\Controllers\DashboardController;


Route::get('login', [logincontroller::class, 'login'])->name('login');
Route::get('inicio', [logincontroller::class, 'inicio'])->name('inicio');
Route::get('animo', [logincontroller::class, 'animo'])->name('animo');

Route::get('/recursos', [RecursosController::class, 'recursos'])->name('recursos.serenit');

Route::prefix('terapias')->group(function() {
    Route::get('/', [TerapiasController::class, 'terapia'])->name('terapias');
    Route::get('/crear-cita', [TerapiasController::class, 'crearCita'])->name('citas.create');
    Route::post('/guardar-cita', [TerapiasController::class, 'guardarCita'])->name('citas.store');
});
Route::get('/programar-cita/{terapeutaId}', [CitaController::class, 'showForm'])->name('programar-cita');

Route::get('/dashboard', [DashboardController::class, 'index']);



