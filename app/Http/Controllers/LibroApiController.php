<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los libros
        $libros = Libro::all();
        return response()->json($libros, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen_url' => 'nullable|string',
            'pdf_url' => 'required|string',
            'Materia' => 'required|string|max:255',
        ]);

        // Crear un nuevo libro
        $libro = Libro::create($validated);

        return response()->json($libro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscar un libro por su ID
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        return response()->json($libro, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar el libro por su ID
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen_url' => 'nullable|string',
            'pdf_url' => 'required|string',
            'Materia' => 'required|string|max:255',
        ]);

        // Actualizar el libro
        $libro->update($validated);

        return response()->json($libro, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el libro por su ID
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        // Eliminar el libro
        $libro->delete();

        return response()->json(['message' => 'Libro eliminado exitosamente'], 200);
    }
}