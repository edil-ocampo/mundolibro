@extends('layouts.headerPrincipal')

@section('title', 'MUNDO LIBRO | EL LUGAR IDEAL PARA BUSCAR LIBROS')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/verLibro.css')}}">
@endsection

@section('content')

<div class="main-container">
    <div class="second-container">
        <img src="{{ $libro->image }}" alt="{{ $libro->name }}">
        <div class="info-container">
            
            <h1>{{ $libro->name }}</h1>
            <h3 class="autor">{{ $libro->author }}</h3>
            <p>{{ $libro->publication_year }} - {{ $libro->genre }}</p>
            <p>Sinopsis: {{ $libro->synopsis }}</p>
            
            @auth
                @if ($libro->price > 0)
                    <a href="#" class="buy-button">Comprar</a>
                @else
                    <a href="{{ route('libros.descargados', $libro->id) }}" download="{{ $libro->name }}.pdf" target="_blank" rel="noopener noreferrer" class="download-link">Descargar</a>
                @endif
            @else
                @if ($libro->price > 0)
                    <p class="message">Inicia sesión o registrate para comprar este libro.</p>
                @else
                    <p class="message">Inicia sesión o registrate para descargar este libro.</p>
                @endif
            @endauth
        </div>
    </div>
</div>

@endsection
