@extends('layouts.headerPrincipal')
@section('title','MUNDO LIBRO - Registro')

@section('style')
<link rel="stylesheet" href="{{asset('/css/registro.css')}}">

@section('content')

<div class="container">
    <div class="form-container">
        <h1>REGISTRO</h1>

       

        <form action="{{ route('usuarios.store') }}" method="POST">
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
                <label for="password_confirmation">Repita su contraseña</label>
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
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
