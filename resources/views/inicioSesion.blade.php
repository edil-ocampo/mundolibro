@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Inicio de sesión')
  
@section('style')
<link rel="stylesheet" href="{{asset('/css/inicioSesion.css')}}">

@section('content')
   
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
       
<div class="container">
    <div class="form-container">
        <h1>INICIO DE SESIÓN</h1> 
      <form  action="{{route('login.store')}}" method="POST">
        @csrf
        <div class="input-group">
          <input type="email"  name="email">
          <label>Correo electrónico</label>
        </div>
        <div class="input-group">
          <input type="password" name="password">
          <label>Contraseña</label>
        </div>
      <br>
        <button type="submit">Iniciar Sesión</button>
      </form>
    </div>
    <div class="image-container">
      <img src="{{ asset('img/logo.jfif') }}" alt="Imagen educativa">
    </div>
  </div>
@endsection