
@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Libros gratuitos')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@section('content')


<div class="title-container">
    <h1>Libros gratuitos</h1>
</div>
<div class="books-container">
    @foreach ($libros as $libroGratis)
    @if ($libroGratis->price == 0)
    <div class="book-card">
        <a href="{{ route('libro.show', $libroGratis->id) }}">
            <img src="{{ $libroGratis->image }}" alt="{{ $libroGratis->name }}">
            <h2 class="color">{{ $libroGratis->name }}</h2>
            <p class="color">{{ $libroGratis->genre }}</p>    
            <p class="color">{{ $libroGratis->publication_year }} </p>
            
            <div class="price">$ Gratis</div>
            
        </a>
    </div>
    @endif
    @endforeach
</div>
@endsection