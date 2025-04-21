<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased" x-data>
    <head>
        @include('partials.head')
    </head>

    <body class="relative bg-white text-green-900 min-h-screen font-sans">
        <header class="w-full h-20 bg-green-700 rounded-t-lg flex items-center justify-between px-4">
            <div class="flex px-4 gap-4">
                @if(!Request::is('/'))
                    <a href="{{ url()->previous()}}">
                        <svg
                    width="24"
                    height="44"
                    viewBox="0 0 24 44"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M23.3198 0.555249C23.477 0.712004 23.6017 0.898221 23.6867 1.10324C23.7718 1.30825 23.8156 1.52803 23.8156 1.75C23.8156 1.97196 23.7718 2.19175 23.6867 2.39676C23.6017 2.60178 23.477 2.788 23.3198 2.94475L4.26121 22L23.3198 41.0552C23.6367 41.3721 23.8147 41.8019 23.8147 42.25C23.8147 42.6981 23.6367 43.1279 23.3198 43.4447C23.003 43.7616 22.5732 43.9396 22.1251 43.9396C21.677 43.9396 21.2472 43.7616 20.9303 43.4447L0.680336 23.1947C0.523185 23.038 0.398502 22.8518 0.313431 22.6468C0.228359 22.4417 0.18457 22.222 0.18457 22C0.18457 21.778 0.228359 21.5583 0.313431 21.3532C0.398502 21.1482 0.523185 20.962 0.680336 20.8052L20.9303 0.555249C21.0871 0.398098 21.2733 0.273416 21.4783 0.188344C21.6833 0.103273 21.9031 0.0594826 22.1251 0.0594826C22.3471 0.0594826 22.5668 0.103273 22.7718 0.188344C22.9769 0.273416 23.1631 0.398098 23.3198 0.555249Z"
                        fill="black"
                    ></path>
                    </svg>
                    </a>     
                @endif
                <a href="{{route('/')}}">
                <img src="{{ asset('img/logo-2024-1.png') }}" alt="{{ __('Logo') }}" class="h-12 object-cover">
                </a>
            </div>
            <div class="flex items-center gap-4">
            <div class="relative flex items-center">
                <input 
                    type="text" 
                    placeholder="{{ __('Busca tus libros') }}" 
                    class="w-full sm:w-80 h-12 rounded-lg bg-gray-300 px-4"
                >
                <svg class="absolute right-4 top-1/2 transform -translate-y-1/2" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z" stroke="black" stroke-width="2" stroke-miterlimit="10"></path>
                </svg>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-green-800 text-white rounded-lg hover:bg-green-600">
                        {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-800 text-white rounded-lg hover:bg-red-600">
                            {{ __('Logout') }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-green-900 text-white rounded-lg hover:bg-green-800">
                        {{ __('Login') }}
                    </a>
                @endauth
            </div>
            </div>
        </header>

        <main class="p-4">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
