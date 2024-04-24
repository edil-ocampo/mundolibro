@extends('layouts.headerPrincipal') 

@section('title', 'MUNDO LIBRO | Libros de - ' . $genero)

@section('style')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">

@section('content')

<div class="title-container">
    <h1>Libros de {{ $genero }}</h1>
</div>
<div class="books-container">

    @if($libros->isEmpty())
        <p style="color: white">No hay libros disponibles en este género.</p>
    @else
    @foreach($libros as $libro)
    <div class="book-card">
        <a href="{{ route('libro.show', $libro->id) }}">
                    <img src="{{ $libro->image }}" alt="{{ $libro->name }}" class="libro-imagen">
                    <h2 class="color">{{ $libro->name }}</h2>
                    <p class="color">{{ $libro->genre }}</p>
                    <p class="color">{{ $libro->publication_year }}</p>
                    @if ($libro->price == 0)
                    <div class="price">$ Gratis</div>
                    @else
                    <div class="price">$ {{ number_format($libro->price, 0, '.' , ',')}}</div>
                    @endif
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
