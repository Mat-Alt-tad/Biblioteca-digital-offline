<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroApiController;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página de libros
Route::get('/libros', function () {
    return view('libros');
})->name('libros');

// Ruta para la página de PDF
Route::get('/lector', function () {
    return view('lector');
})->name('lector');

// Rutas para la API de libros
Route::apiResource('api/libros', LibroApiController::class);
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
