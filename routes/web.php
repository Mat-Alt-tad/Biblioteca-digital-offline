<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroApiController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PdfController;
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
Route::group(['prefix' => 'pdf'], function () {
    Route::get('/', [PdfController::class, 'index'])->name('pdf.index');
    Route::get('/{id}', [PdfController::class, 'show'])->name('pdf.show');
});
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
