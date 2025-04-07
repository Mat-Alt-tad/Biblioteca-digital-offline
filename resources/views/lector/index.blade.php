<x-layouts.app :title="__('Lector')">
<!-- Título de la sección -->
<div class="w-full mt-8 px-4">
    <div class="bg-gray-200 rounded-lg py-4 px-6">
        <p class="text-center text-3xl font-bold">PDF de Libros</p>
    </div>
</div>

<!-- Lista de libros -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 px-4">
    @foreach ($libros as $libro)
    <a href="{{ route('lector.show', $libro->id) }}">
        <div class="bg-gray-200 rounded-lg p-4 flex items-center">
            <div class="w-24 h-32 bg-gray-400 rounded-lg flex items-center justify-center">
                <img src="{{ asset('storage/' . $libro->imagen_url) }}" alt="Imagen del libro" class="h-16">
            </div>
            <div class="ml-4">
                <p class="text-xl font-bold">{{ $libro->titulo }}</p>
                <p class="text-gray-600">Autor: {{ $libro->autor }}</p>
                <p class="text-gray-600">{{ $libro->descripcion }}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>

</div>
</x-layouts.app>
