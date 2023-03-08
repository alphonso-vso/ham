<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/tiempos', function () {
        return view('tiempos');
    })->name('tiempos');
    Route::get('/adicionales', function () {
        return view('adicionales');
    })->name('adicionales');
    Route::get('/usuarios', function () {
        return view('usuarios');
    })->name('usuarios');
    Route::get('/platillos', function () {
        return view('platillos');
    })->name('platillos');
    Route::get('/dias', function () {
        return view('dias');
    })->name('dias');
    Route::get('/platillos-dia', function () {
        return view('platillos-dia');
    })->name('platillos-dia');
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu');
});
