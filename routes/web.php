<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\LibroApiController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LectorController;
use App\Models\Libro;

Route::get('/', function () {
    $materias = Libro::select('Materia')->distinct()->get();

    return view('welcome', compact('materias'));
})->name('/');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Ruta para la página de PDF
Route::get('/lector', function () {
    return view('lector');
})->name('lector');

// Rutas de libros
Route::apiResource('api/libros', LibroApiController::class);
Route::resource('libros', LibroController::class)->middleware(['auth']);
// Ruta para el lector
Route::get('/lector', [LectorController::class, 'index'])->name('lector.index');
Route::get('/lector/{id}', [LectorController::class, 'show'])->name('lector.show');

require __DIR__.'/auth.php';
