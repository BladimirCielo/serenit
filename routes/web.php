<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\moodcontroller;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\TerapiasController;
use App\Http\Controllers\DashboardController;


Route::get('login',[logincontroller::class,'login'])->name('login');
Route::POST('validar',[logincontroller::class,'validar'])->name('validar');
Route::POST('crearusuario',[logincontroller::class,'crearusuario'])->name('crearusuario');
Route::get('cerrarsesion',[logincontroller::class,'cerrarsesion'])->name('cerrarsesion');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/estadoanimo', [DashboardController::class, 'estadoAnimo'])->name('estadoanimo');

Route::get('inicio',[logincontroller::class,'inicio'])->name('inicio');
Route::get('inicio', [logincontroller::class, 'inicio'])->name('inicio');
Route::get('animo', [logincontroller::class, 'animo'])->name('animo');

Route::get('mood',[moodcontroller::class,'mood'])->name('mood');
Route::POST('registrarEstadoAnimo',[moodcontroller::class,'registrarEstadoAnimo'])->name('registrarEstadoAnimo');
Route::get('moodTrend',[moodcontroller::class,'moodTrend'])->name('moodTrend');
Route::get('generarRecomendaciones',[moodcontroller::class,'generarRecomendaciones'])->name('generarRecomendaciones');
Route::get('showcharts',[moodcontroller::class,'showcharts'])->name('showcharts');
Route::get('getMoodReport',[moodcontroller::class,'getMoodReport'])->name('getMoodReport');


Route::get('organizador',[logincontroller::class,'organizador'])->name('organizador');
Route::get('calendar',[logincontroller::class,'calendar'])->name('calendar');

Route::get('/recursos', [RecursosController::class, 'recursos'])->name('recursos.serenit');

Route::prefix('terapias')->group(function() {
    Route::get('/', [TerapiasController::class, 'terapia'])->name('terapias');
        Route::get('/crear-cita', [TerapiasController::class, 'crearCita'])->name('citas.create');
        Route::get('/programar-cita/{terapeutaId}', [TerapiasController::class, 'crearCita'])
        ->name('programar-cita');
        Route::post('/terapias/guardar-cita', [TerapiasController::class, 'guardarCita'])
     ->name('citas.store')
     ->middleware('auth');
    });

Route::get('/emergencia', [EmergenciaController::class, 'index'])->name('emergencia');





