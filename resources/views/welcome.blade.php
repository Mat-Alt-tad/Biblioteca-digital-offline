<x-layouts.app :title="__('Home')">

    <!-- Section: About Us -->
    <section class="mt-8 mx-4 p-6 bg-gray-200 rounded-lg flex flex-col lg:flex-row">
        <img src="{{ asset('img/image.png') }}" alt="{{ __('About Us') }}" class="w-full lg:w-1/2 h-auto rounded-lg object-cover">
        <div class="mt-4 lg:mt-0 lg:ml-8">
            <h2 class="text-3xl font-bold mb-4 text-center lg:text-left">{{ __('¿Qué somos?') }}</h2>
            <p class="text-lg text-gray-700 text-justify">
                {{ __('Lorem ipsum dolor sit amet, adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu.') }}
            </p>
        </div>
    </section>

    <!-- Section: PDF by Subject -->
    <section class="mt-8 mx-4 p-6 bg-gray-200 rounded-lg">
        <h2 class="text-3xl font-bold text-center mb-6">{{ __('PDF por materias') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{route('lector.index')}}">
                <div class="bg-green-600 text-white text-center py-8 rounded-lg border border-black">
                    <p class="text-2xl">{{ __('Todos') }}</p>
                </div>
            </a>
            @foreach ($materias as $materia)
            <a href="{{ route('lector.index', ['materia' => $materia->materia]) }}">
                <div class="bg-green-600 text-white text-center py-8 rounded-lg border border-black">
                    <p class="text-2xl">{{ $materia->Materia }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </section>
</x-layouts.app>