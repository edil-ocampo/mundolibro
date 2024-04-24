@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Registro de Administrador')

@section('style')
<link rel="stylesheet" href="{{asset('/css/registro.css')}}">

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <div class="form-container">
        <h1>REGISTRO ADMIN</h1>

       

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <input type="text" name="name" value="{{ old('name') }}">
                <label for="name">Nombre y apellido</label>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <input type="email" name="email" value="{{ old('email') }}" >
                <label for="email">Correo electrónico</label>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" name="password" >
                <label for="password">Contraseña</label>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" name="password_confirmation" >
                <label for="password_confirmation">Repita la contraseña</label>
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="role" value="Admin">
            <button type="submit">Crear Administrador</button>
        </form>
    </div>
    <div class="image-container">
        <img src="{{ asset('img/logo.jfif') }}" alt="Imagen educativa">
    </div>
</div>
@endsection
