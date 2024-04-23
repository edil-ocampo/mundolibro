@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO | VAMOS A REGISTRARNOS')
  
@section('style')
<link rel="stylesheet" href="{{asset('/css/registro.css')}}">

@section('content')       
<div class="container">
    <div class="form-container">
        <h1>REGISTRO</h1> 
      <form action="{{route('usuarios.store')}}" method="POST">
        @csrf
        <div class="input-group">
          <input type="text" name="name" required>
          <label>Nombre y apellido</label>
        </div>
        <div class="input-group">
          <input type="email" name="email" required>
          <label>Correo electrónico</label>
        </div>
        <div class="input-group">
          <input type="password" name="password">
          <label>Contraseña</label>
        </div>
        <div class="input-group">
          <input type="password" name="password_confirmation" required>
          <label>Repita su contraseña</label>
        </div>
        <input type="hidden" name="role" value="User">
        <button type="submit">Registrarme</button>
      </form>
    </div>
    <div class="image-container">
      <img src="{{ asset('img/logo.jfif') }}" alt="Imagen educativa">
    </div>
  </div>
@endsection