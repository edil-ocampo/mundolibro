@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Subir libro')

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
        <input type="text" name="name" value="{{ old('name') }}">
        <label for="name">Nombre del libro</label>
        @error('name')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <input type="text" name="author" value="{{ old('author') }}">
        <label for="author">Autor del libro</label>
        @error('author')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <input type="tel" name="publication_year" value="{{ old('publication_year') }}">
        <label for="publication_year">Año de publicación</label>
        @error('publication_year')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <select name="genre">
          <option disabled selected hidden>Género del libro</option>
          <option value="Romance" {{ old('genre') === 'Romance' ? 'selected' : '' }}>Romance</option>
          <option value="Aventura" {{ old('genre') === 'Aventura' ? 'selected' : '' }}>Aventura</option>
          <option value="Ciencia ficción" {{ old('genre') === 'Ciencia ficción' ? 'selected' : '' }}>Ciencia ficción</option>
          <option value="Fantasía" {{ old('genre') === 'Fantasía' ? 'selected' : '' }}>Fantasía</option>
          <option value="Terror" {{ old('genre') === 'Terror' ? 'selected' : '' }}>Terror</option>
          <option value="Poesía" {{ old('genre') === 'Poesía' ? 'selected' : '' }}>Poesía</option>
          <option value="Novela" {{ old('genre') === 'Novela' ? 'selected' : '' }}>Novela</option>
          <option value="Cuentos" {{ old('genre') === 'Cuentos' ? 'selected' : '' }}>Cuentos</option>
          <option value="Ensayos" {{ old('genre') === 'Ensayos' ? 'selected' : '' }}>Ensayos</option>
          <option value="Historia" {{ old('genre') === 'Historia' ? 'selected' : '' }}>Historia</option>
          <option value="Política" {{ old('genre') === 'Política' ? 'selected' : '' }}>Política</option>
          <option value="Biografía" {{ old('genre') === 'Biografía' ? 'selected' : '' }}>Biografía</option>
          <option value="Infantil" {{ old('genre') === 'Infantil' ? 'selected' : '' }}>Infantil</option>
          <option value="Filosofía" {{ old('genre') === 'Filosofía' ? 'selected' : '' }}>Filosofía</option>
        </select>
        @error('genre')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <input type="number" name="price" value="{{ old('price') }}">
        <label for="price">Costo del libro</label>
        @error('price')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <textarea id="synopsis" name="synopsis" placeholder="Sinopsis del libro">{{ old('synopsis') }}</textarea>
        @error('synopsis')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <input type="file" name="image" >
        <label for="image">Foto de la portdada del libro</label>
        @error('image')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input-group">
        <input type="url" name="url" value="{{ old('url') }}">
        <label for="url">Link de descarga</label>
        @error('url')
          <span class="error-message">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit">Subir libro</button>
    </form>
  </div
  @endsection
