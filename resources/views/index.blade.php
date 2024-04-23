@php
use App\Models\Book;
use App\Http\Controllers\BookController;
$libros = Book::all();
@endphp
@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO | EL LUGAR IDEAL PARA BUSCAR LIBROS')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@section('content')
    
<div class="books-container">
    @foreach ($libros as $libro)
        <div class="book-card">
            <a href="{{ route('libro.show', $libro->id) }}">
            <img src="{{ $libro->image }}" alt="{{ $libro->name }}">
            <h2 class="color">{{ $libro->name }}</h2>
            <p class="color">{{ $libro->genre }}</p>    
            <p class="color">{{ $libro->publication_year }} </p>
            @if ($libro->price == 0)
            <div class="price">$ Gratis</div>
            @else
            <div class="price">$ {{ number_format($libro->price, 0, '.' , ',')}}</div>
            @endif
            </a>
        </div>
    @endforeach
</div>
@endsection