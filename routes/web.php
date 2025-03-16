<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;

Route::get('login',[logincontroller::class,'login'])->name('login');