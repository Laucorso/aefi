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

    Route::get('/informacion-societaria', function(){
        return view('info-societaria');
    })->name('info-societaria');

    Route::get('/directorio-asociados', function(){
        return view('directorio-asociados');
    })->name('directorio-asociados'); 

    Route::get('/descuentos', function(){
        return view('descuentos');
    })->name('descuentos');

    Route::get('/descargas', function(){
        return view('descargas');
    })->name('descargas');

    Route::get('/galeria', function(){
        return view('galeria');
    })->name('galeria');

    Route::get('/revista', function(){
        return view('revista');
    })->name('revista');

    Route::get('/florista-directo', function(){
        return view('dashboard');
    })->name('floristaDirecto');
});
