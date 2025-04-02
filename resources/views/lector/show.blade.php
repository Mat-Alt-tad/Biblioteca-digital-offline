@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-4">{{ $libro->titulo }}</h1>
    <div class="flex justify-center">
        <iframe 
            src="{{asset('storage/'.$libro->pdf_url)}}" 
            width="80%" 
            height="800px" 
            class="border rounded-lg shadow-lg">
        </iframe>
    </div>
</div>
@endsection