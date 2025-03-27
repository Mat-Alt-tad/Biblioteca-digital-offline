<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtén la materia desde la solicitud
        $materia = $request->query('materia');
    
        // Filtra los libros por materia si se proporciona, de lo contrario, obtén todos
        $libros = $materia 
            ? Libro::where('materia', $materia)->get() 
            : Libro::all();
    
        // Retorna la vista con los libros filtrados
        return view('pdf.index', compact('libros', 'materia'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the book by its ID
        $libro = Libro::findOrFail($id);

        // Return the view with the book details
        return view('pdf.show', compact('libro'));
    }
}
