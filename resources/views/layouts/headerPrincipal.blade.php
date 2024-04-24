<!DOCTYPE html>
<html lang="es">
<head>

  <title>@yield('title', '')</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/headerPrincipal.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/logo.jfif') }}">

@yield('style')


</head>
<body>
  <header>
    <div class="logo">
      <img src="{{asset('img/logo.jfif')}}" alt="Logo">
      <span>MUNDO LIBRO</span>
  </div>
  @auth
      <div class="user-container">
          <i class="fas fa-user fa-2x"></i>
          <div class="user-name"> {{ Auth::user()->name }} </div>
      </div>
  @endauth
    <nav>
      <ul>
        <li><a href="{{ route('index.principal')}}" class="nav-link active" data-target="inicio">Inicio</a></li>
        <li class="genres-link">
            <a href="#" class="nav-link" data-target="generos">Géneros</a>
            <ul class="subgenres">
              <li><a href="{{ route('libros.por.genero', 'Romance') }}" class="subgenre-link">Romance</a></li>
              <li><a href="{{ route('libros.por.genero', 'Aventura') }}" class="subgenre-link">Aventura</a></li>
              <li><a href="{{ route('libros.por.genero', 'Ciencia ficción') }}" class="subgenre-link">Ciencia ficción</a></li>
              <li><a href="{{ route('libros.por.genero', 'Fantasía') }}" class="subgenre-link">Fantasía</a></li>
              <li><a href="{{ route('libros.por.genero', 'Terror') }}" class="subgenre-link">Terror</a></li>
              <li><a href="{{ route('libros.por.genero', 'Poesía') }}" class="subgenre-link">Poesía</a></li>
              <li><a href="{{ route('libros.por.genero', 'Novela') }}" class="subgenre-link">Novela</a></li>
              <li><a href="{{ route('libros.por.genero', 'Cuentos') }}" class="subgenre-link">Cuentos</a></li>
              <li><a href="{{ route('libros.por.genero', 'Ensayos') }}" class="subgenre-link">Ensayos</a></li>
              <li><a href="{{ route('libros.por.genero', 'Historia') }}" class="subgenre-link">Historia</a></li>
              <li><a href="{{ route('libros.por.genero', 'Política') }}" class="subgenre-link">Política</a></li>
              <li><a href="{{ route('libros.por.genero', 'Biografía') }}" class="subgenre-link">Biografía</a></li>
              <li><a href="{{ route('libros.por.genero', 'Infantil') }}" class="subgenre-link">Infantil</a></li>
              <li><a href="{{ route('libros.por.genero', 'Filosofía') }}" class="subgenre-link">Filosofía</a></li>
            </ul>
          </li>
          <li><a href="#" class="nav-link" data-target="perfil">Tipo</a>
            <ul class="sub-profile">
              <li><a href="{{route ('libros.gratis')}}" class="sub-profile-link">Gratis</a></li>
              <li><a href="{{route ('libros.pago')}}" class="sub-profile-link">De paga</a></li>
            </ul>

        @guest 
        <li><a  href="{{route('registro')}}" class="nav-link" data-target="registrarse">Registrarse</a></li>
        <li><a href="{{route('login')}}" class="nav-link" data-target="iniciar-sesion">Iniciar Sesión</a></li>
        @endguest
            @auth
            @if(Auth::user()->role == 'Admin')
              <li><a href="{{route('subirlibro')}}" class="nav-link" data-target="">Subir libro</a>
            @endif
              <li><a href="#" class="nav-link" data-target="perfil">Perfil</a>
              <ul class="sub-profile">
            @if (Auth::user()->role == 'Admin')
              <li><a href="#" class="sub-profile-link">Libros comprados</a></li> 
              <li><a href="{{route('registro.admin')}}" class="sub-profile-link">Crear Administrador</a></li> 
            @elseif(Auth::user()->role == 'User')
              <li><a href="{{route ('show.librosdescargados')}}" class="sub-profile-link">Mis libros</a></li>
            @endif
            <li><a href="{{route('logout')}}" class="sub-profile-link">Cerrar sesión</a></li>
            @endauth
          </ul>
        </li>
      </ul>
    </nav>
  </header>


@yield('content')
  
</body>
</html>
