<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

class LectorController extends Controller
{
    public function index(Request $request)
    {
         // Obtén la materia desde la solicitud
         $materia = $request->query('materia');
    
         // Filtra los libros por materia si se proporciona, de lo contrario, obtén todos
         $libros = $materia 
             ? Libro::where('materia', $materia)->get() 
             : Libro::all();
     
         // Retorna la vista con los libros filtrados
         return view('lector.index', compact('libros', 'materia'));
    }

    public function show($id)
    {
        // Encuentra el libro por su ID
        $libro = Libro::findOrFail($id);

        // Retorna la vista con los detalles del libro
        return view('lector.show', compact('libro'));
    }
}
