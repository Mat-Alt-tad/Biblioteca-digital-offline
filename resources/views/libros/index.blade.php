<x-layouts.app :title="'Gestión_de_Libros'">
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
                        <td class="border border-gray-300 px-4 py-2 flex justify-center">
                            <img src="{{ asset('storage/' . $libro->imagen_url) }}" alt="Imagen del libro" class="h-16">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->titulo }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->autor }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $libro->Materia }}</td>
                        <td class="border border-gray-300 px-4 py-2 ">
                            <div class="flex gap-2 justify-between">
                            <button 
                                onclick="openModal('{{ asset('storage/' . $libro->pdf_url) }}')" 
                                class="bg-blue-500 text-white px-2 py-1 rounded">
                                {{ __('Ver PDF') }}
                            </button>
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
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Modal -->
    <div id="pdfModal" class="fixed inset-0 flex items-center justify-center hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative bg-gray-100 rounded-lg shadow-lg w-3/4 h-3/4">
            <div class="flex justify-between items-center p-4 border-b">
                <h2 class="text-lg font-bold">{{ __('Vista de PDF') }}</h2>
                <button onclick="closeModal()" class="text-red-500 font-bold">&times;</button>
            </div>
            <div class="p-4 h-full">
                <iframe id="pdfViewer" src="" class="w-full h-115"></iframe>
            </div>
        </div>
    </div>
    
    <script>
        function openModal(pdfUrl) {
            document.getElementById('pdfViewer').src = pdfUrl;
            document.getElementById('pdfModal').classList.remove('hidden');
        }
    
        function closeModal() {
            document.getElementById('pdfViewer').src = '';
            document.getElementById('pdfModal').classList.add('hidden');
        }
    </script>
    </x-layouts.app>