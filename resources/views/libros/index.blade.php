@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-6">{{ __('Gestión de Libros') }}</h1>

    <!-- Mensajes de éxito -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para añadir un nuevo libro -->
    <a href="{{ route('libros.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">
        {{ __('Añadir Libro') }}
    </a>

    <!-- Tabla de libros -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">{{ __('Imagen') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Título') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Autor') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Materia') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <!-- Imagen del libro -->
                    <td class="border border-gray-300 px-4 py-2">
                        <img src="{{ asset('storage/' . $libro->imagen_url) }}" alt="Imagen del libro" class="h-16">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $libro->titulo }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $libro->autor }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $libro->Materia }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <!-- Botón para ver el PDF -->
                        <a href="{{ asset('storage/' . $libro->pdf_url) }}" target="_blank" class="bg-blue-500 text-white px-2 py-1 rounded">
                            {{ __('Ver PDF') }}
                        </a>
                        <!-- Botón para editar -->
                        <a href="{{ route('libros.edit', $libro->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">
                            {{ __('Editar') }}
                        </a>
                        <!-- Botón para eliminar -->
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('{{ __('¿Estás seguro de eliminar este libro?') }}')">
                                {{ __('Eliminar') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection