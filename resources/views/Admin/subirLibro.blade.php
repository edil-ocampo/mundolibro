@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO | EL LUGAR IDEAL PARA BUSCAR LIBROS')
    
@section('style')
<link rel="stylesheet" href="{{asset('/css/subirLibro.css')}}">
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="form-container">
        <h1>SUBIR LIBRO</h1> 
      <form action="{{route('libro.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
          <input type="text" name="name" required>
          <label>Nombre del libro</label>
        </div>
        <div class="input-group">
          <input type="text" name="author" required>
          <label>Autor del libro</label>
        </div>
        <div class="input-group">
          <input type="tel" name="publication_year">
          <label>Año de publicación</label>
        </div>
        <div class="input-group">
            <select name="genre" required>
                <option disabled selected hidden>Género del libro</option>
                <option value="Romance">Romance</option>
                <option value="Aventura">Aventura</option>
                <option value="Ciencia ficción">Ciencia ficción</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Terror">Terror</option>
                <option value="Poesía">Poesía</option>x
                <option value="Novela">Novela</option>
                <option value="Cuentos">Cuentos</option>
                <option value="Ensayos">Ensayos</option>
                <option value="Historia">Historia</option>
                <option value="Política">Política</option>
                <option value="Biografía">Biografía</option>
                <option value="Infantil">Infantil</option>
                <option value="Filosofía">Filosofía</option>
            </select>
          </div>
        <div class="input-group">
          <input type="number" name="price" required>
          <label>Costo del libro</label>
        </div>
        <div class="input-group">
            {{-- <label for="synopsis">Sinopsis del libro</label> --}}
            <textarea id="synopsis" name="synopsis" placeholder="Sinopsis del libro"></textarea>
        </div>
        <div class="input-group">
            <input type="file" name="image" required>
            <label>Foto de la portdada del libro</label>
          </div>
          <div class="input-group">
            <input type="url" name="url" required>
            <label>Link de descarga</label>
          </div>
        <button type="submit">Subir libro</button>
      </form>
    </div>
  </div>
@endsection