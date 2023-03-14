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
    })->name('tiempos')->middleware('role:super-admin');
    Route::get('/adicionales', function () {
        return view('adicionales');
    })->name('adicionales')->middleware('role:super-admin');
    Route::get('/usuarios', function () {
        return view('usuarios');
    })->name('usuarios')->middleware('role:super-admin');
    Route::get('/platillos', function () {
        return view('platillos');
    })->name('platillos')->middleware('role:super-admin');
    Route::get('/dias', function () {
        return view('dias');
    })->name('dias')->middleware('role:super-admin');
    Route::get('/platillos-dia', function () {
        return view('platillos-dia');
    })->name('platillos-dia')->middleware('role:super-admin');
    Route::get('/menu', function () {
        return view('menu');
    })->name('menu');
    Route::get('/ordenes', function () {
        return view('ordenes');
    })->name('ordenes')->middleware('role:super-admin');
    Route::get('/facturas', function () {
        return view('facturas');
    })->name('facturas');
    Route::get('/control', function () {
        return view('control');
    })->name('control');
});
