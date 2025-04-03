<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\moodcontroller;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\TerapiasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;


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


Route::get('organizador',[CalendarController::class,'organizador'])->name('organizador');
Route::get('calendar', [CalendarController::class, 'calendar'])->name('calendar');
Route::get('formevent', [CalendarController::class, 'formevent'])->name('formevent');
Route::POST('createevent', [CalendarController::class, 'createevent'])->name('createevent');
Route::get('details/{id}', [CalendarController::class, 'details'])->name('details');
Route::get('index', [CalendarController::class, 'index'])->name('index');
Route::get('index_month/{month}', [CalendarController::class, 'index_month'])->name('index_month');
Route::get('eventedit/{id_evento}',[CalendarController::class,'eventedit'])->name('eventedit');
Route::POST('guardacambios',[CalendarController::class,'guardacambios'])->name('guardacambios');
Route::get('eliminarEvento/{id_evento}',[CalendarController::class,'eliminarEvento'])->name('eliminarEvento');

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