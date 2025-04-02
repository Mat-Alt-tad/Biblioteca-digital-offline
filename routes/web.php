<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroApiController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LectorController;
use App\Models\Libro;
// Ruta para la página de bienvenida
Route::get('/', function () {
    $materias = Libro::select('Materia')->distinct()->get();

    return view('welcome', compact('materias'));
});

// Ruta para la página de PDF
Route::get('/lector', function () {
    return view('lector');
})->name('lector');

// Rutas de libros
Route::apiResource('api/libros', LibroApiController::class);
Route::resource('libros', LibroController::class);
// Ruta para el lector
Route::get('/lector', [LectorController::class, 'index'])->name('lector.index');
Route::get('/lector/{id}', [LectorController::class, 'show'])->name('lector.show');

