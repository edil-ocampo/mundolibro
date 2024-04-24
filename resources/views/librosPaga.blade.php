
@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Libros de paga')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
@section('content')


<div class="title-container">
    <h1>Libros de paga</h1>
</div>
<div class="books-container">
    @foreach ($libros as $libroPaga)
    @if ($libroPaga->price > 0)
    <div class="book-card">
        <a href="{{ route('libro.show', $libroPaga->id) }}">
            <img src="{{ $libroPaga->image }}" alt="{{ $libroPaga->name }}">
            <h2 class="color">{{ $libroPaga->name }}</h2>
            <p class="color">{{ $libroPaga->genre }}</p>    
            <p class="color">{{ $libroPaga->publication_year }} </p>
            
            <div class="price">$ {{ number_format($libroPaga->price, 0, '.' , ',')}}</div>
            
        </a>
    </div>
    @endif
    @endforeach
</div>
@endsection