{{-- filepath: c:\Users\Matlag\Desktop\programacion\universidad\Biblio-offline\resources\views\pdf\show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $libro->titulo }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-4">{{ $libro->titulo }}</h1>
        <div class="flex justify-center">
            <iframe 
                src="{{ $libro->pdf_url }}" 
                width="80%" 
                height="600px" 
                class="border rounded-lg shadow-lg">
            </iframe>
        </div>
    </div>
</body>
</html>