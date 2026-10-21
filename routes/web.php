<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); });
Route::get('/directorio', function () { return view('directorio'); });
Route::get('/guia-paciente', function () { return view('guia-paciente'); });
Route::get('/horarios', function () { return view('guia-paciente'); });
Route::get('/citas', function () { return view('citas'); });
Route::get('/servicios', function () { return view('servicios'); });
Route::get('/noticias', function () { return view('noticias'); });
Route::get('/preguntas', function () { return view('preguntas'); });
Route::get('/directorio-medico', function () { return view('directorio-medico'); });
Route::get('/nosotros', function () { return view('nosotros'); });
Route::get('/contacto', function () { return view('contacto'); });