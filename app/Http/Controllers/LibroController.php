<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'imagen_file' => 'required|image|max:2048', // Validación para la imagen
            'pdf_file' => 'required|mimes:pdf|max:2048', // Validación para el archivo PDF
            'Materia' => 'required',
        ]);

        // Subir la imagen
        $imagenPath = $request->file('imagen_file')->store('imagenes', 'public');

        // Subir el archivo PDF
        $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

        // Crear el libro con las rutas de la imagen y el PDF
        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'descripcion' => $request->descripcion,
            'imagen_url' => $imagenPath,
            'pdf_url' => $pdfPath,
            'Materia' => $request->Materia,
        ]);

        return redirect()->route('libros.index')
            ->with('success', 'Libro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.form', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'imagen_file' => 'nullable|image|max:2048', // Validación para la imagen
            'pdf_file' => 'nullable|mimes:pdf|max:2048', // Validación para el archivo PDF
            'Materia' => 'required',
        ]);

        // Subir la nueva imagen si se proporciona
        if ($request->hasFile('imagen_file')) {
            // Eliminar la imagen anterior
            if ($libro->imagen_url) {
                Storage::disk('public')->delete($libro->imagen_url);
            }

            $imagenPath = $request->file('imagen_file')->store('imagenes', 'public');
            $libro->imagen_url = $imagenPath;
        }

        // Subir el nuevo archivo PDF si se proporciona
        if ($request->hasFile('pdf_file')) {
            // Eliminar el archivo PDF anterior
            if ($libro->pdf_url) {
                Storage::disk('public')->delete($libro->pdf_url);
            }

            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');
            $libro->pdf_url = $pdfPath;
        }

        $libro->update($request->except(['imagen_file', 'pdf_file']));

        return redirect()->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        // Eliminar la imagen y el archivo PDF asociados
        if ($libro->imagen_url) {
            Storage::disk('public')->delete($libro->imagen_url);
        }

        if ($libro->pdf_url) {
            Storage::disk('public')->delete($libro->pdf_url);
        }

        $libro->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}