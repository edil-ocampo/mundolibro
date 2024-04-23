<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;



//Vista index principal
Route::view('/','index')->name('index.principal');
//Rutas de registro
Route::get('/Registro', [UserController::class, 'create'])->name('registro');
Route::post('/Registroexitoso', [UserController::class, 'store'])->name('usuarios.store');
//Rutas de iniciar sesión
Route::get('/Login', [UserController::class, 'login'])->name('login');
Route::post('/Loginexitoso', [UserController::class, 'storeLogin'])->name('login.store');
//Rutas de cerrar sesión
Route::get('CerrarSesión', [UserController::class, 'logout'])->name('logout');
//Middleware
Route::group(['middleware' => 'redirecionTipoUsuario'], function(){

});
//Rutas de subir libro
Route::get('/Subirlibro', [BookController::class, 'create'])->name('subirlibro');
Route::post('/Subirlibroexitoso', [BookController::class, 'store'])->name('libro.store');
//Rutas para ver el libro
Route::get('/libro/{id}', [BookController::class,'show'])->name('libro.show');
//Rutas para ver libros descargados
Route::get('/libros-descargados/{book}', [DownloadController::class, 'librosDescargados'])->name('libros.descargados');
Route::get('/downloads', [DownloadController::class, 'showLibrosDescargados'])->name('show.librosdescargados');
//FILTRO POR GENERO

Route::get('/libros/{genero}', [BookController::class,'filtrarPorGenero'])->name('libros.por.genero');
