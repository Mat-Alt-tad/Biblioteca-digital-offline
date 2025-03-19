<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libros</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <!-- Contenedor principal -->
    <div class="relative overflow-hidden bg-white">
        <!-- Header -->
        <div class="w-full h-20 bg-green-700 flex items-center justify-between px-4 rounded-t-lg">
            <div class="flex items-center">
                <svg
                    width="24"
                    height="44"
                    viewBox="0 0 24 44"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="mr-4"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M23.3198 0.555249C23.477 0.712004 23.6017 0.898221 23.6867 1.10324C23.7718 1.30825 23.8156 1.52803 23.8156 1.75C23.8156 1.97196 23.7718 2.19175 23.6867 2.39676C23.6017 2.60178 23.477 2.788 23.3198 2.94475L4.26121 22L23.3198 41.0552C23.6367 41.3721 23.8147 41.8019 23.8147 42.25C23.8147 42.6981 23.6367 43.1279 23.3198 43.4447C23.003 43.7616 22.5732 43.9396 22.1251 43.9396C21.677 43.9396 21.2472 43.7616 20.9303 43.4447L0.680336 23.1947C0.523185 23.038 0.398502 22.8518 0.313431 22.6468C0.228359 22.4417 0.18457 22.222 0.18457 22C0.18457 21.778 0.228359 21.5583 0.313431 21.3532C0.398502 21.1482 0.523185 20.962 0.680336 20.8052L20.9303 0.555249C21.0871 0.398098 21.2733 0.273416 21.4783 0.188344C21.6833 0.103273 21.9031 0.0594826 22.1251 0.0594826C22.3471 0.0594826 22.5668 0.103273 22.7718 0.188344C22.9769 0.273416 23.1631 0.398098 23.3198 0.555249Z"
                        fill="black"
                    ></path>
                </svg>
                <p class="text-white text-lg font-bold">Libros</p>
            </div>
            <div class="relative flex items-center w-full max-w-lg">
                <input 
                    type="text" 
                    placeholder="Busca tus libros" 
                    class="w-full h-12 rounded-lg bg-gray-300 px-4"
                >
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2"
                >
                    <path
                        d="M12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23Z"
                        stroke="black"
                        stroke-width="2"
                        stroke-miterlimit="10"
                    ></path>
                </svg>
            </div>
        </div>

        <!-- Título de la sección -->
        <div class="w-full mt-8 px-4">
            <div class="bg-gray-200 rounded-lg py-4 px-6">
                <p class="text-center text-3xl font-bold">PDF de [Tema]</p>
            </div>
        </div>

        <!-- Lista de libros -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8 px-4">
            @for ($i = 0; $i < 6; $i++)
            <a href="{{route('lector')}}"" >    
            <div class="bg-gray-200 rounded-lg p-4 flex items-center">
                    <div class="w-24 h-32 bg-gray-400 rounded-lg"></div>
                    <div class="ml-4">
                        <p class="text-xl font-bold">TITULO</p>
                        <p class="text-gray-600">Descripción</p>
                    </div>
                </div>
            </a>
            @endfor
        </div>

        <!-- Paginación -->
        <div class="flex justify-center items-center mt-8">
            @for ($i = 1; $i <= 5; $i++)
                <div class="w-12 h-12 flex items-center justify-center bg-gray-300 rounded-full mx-2">
                    <p class="text-lg font-bold">{{ $i }}</p>
                </div>
            @endfor
        </div>
    </div>
</body>
</html>