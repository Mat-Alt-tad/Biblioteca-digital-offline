@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">
        {{ isset($libro) ? __('Editar Libro') : __('Añadir Libro') }}
    </h1>

    <form action="{{ isset($libro) ? route('libros.update', $libro->id) : route('libros.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($libro))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="titulo" class="block text-gray-700">{{ __('Título') }}</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo ?? '') }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="autor" class="block text-gray-700">{{ __('Autor') }}</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor ?? '') }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700">{{ __('Descripción') }}</label>
            <textarea id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded px-4 py-2" required>{{ old('descripcion', $libro->descripcion ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="imagen_file" class="block text-gray-700">{{ __('Imagen') }}</label>
            <input type="file" id="imagen_file" name="imagen_file" class="w-full border border-gray-300 rounded px-4 py-2" required>
            @if (isset($libro) && $libro->imagen_url)
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('Imagen actual:') }} <img src="{{ asset('storage/' . $libro->imagen_url) }}" alt="Imagen del libro" class="h-16">
                </p>
            @endif
        </div>
        <div class="mb-4">
            <label for="pdf_file" class="block text-gray-700">{{ __('Archivo PDF') }}</label>
            <input type="file" id="pdf_file" name="pdf_file" class="w-full border border-gray-300 rounded px-4 py-2">
            @if (isset($libro) && $libro->pdf_url)
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('Archivo actual:') }} <a href="{{ asset('storage/' . $libro->pdf_url) }}" target="_blank" class="text-blue-500">{{ __('Ver PDF') }}</a>
                </p>
            @endif
        </div>
        <div class="mb-4">
            <label for="Materia" class="block text-gray-700">{{ __('Materia') }}</label>
            <input type="text" id="Materia" name="Materia" value="{{ old('Materia', $libro->Materia ?? '') }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            {{ isset($libro) ? __('Actualizar') : __('Guardar') }}
        </button>
    </form>
</div>
@endsection