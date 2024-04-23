@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO | EL LUGAR IDEAL PARA BUSCAR LIBROS')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/index.css')}}">
    
@section('content')
{{-- <div class="books-container-wrapper"> --}}
    <div class="title-container">
        <h1>Libros descargados</h1>
    </div>
    <div class="books-container">
        @if($downloads->isEmpty())
            <p style="color: white">No has descargado ningún libro aún.</p>
        @else
            @foreach ($downloads as $download)
                <div class="book-card">
                    <a>
                        <img src="{{ $download->book->image }}" alt="{{ $download->book->name }}">
                        <h2 class="color">{{ $download->book->name }}</h2>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
{{-- </div> --}}

@endsection
