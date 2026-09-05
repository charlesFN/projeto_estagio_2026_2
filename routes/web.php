<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;

Route::get('/', [AgendamentoController::class, 'index'])->name('home');
Route::post('/agendar', [AgendamentoController::class,'create'])->name('agendar');