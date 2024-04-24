<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\WebhooksController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


//Vista raíz 
Route::get('/',[BookController::class, 'index'])->name('index.principal');
//Registro usuario
Route::get('/registro', [UserController::class, 'create'])->name('registro');
Route::post('/registroexitoso', [UserController::class, 'store'])->name('usuarios.store');
//Registro Admin
Route::get('/registroadmin', [UserController::class, 'createAdmin'])->name('registro.admin');
Route::post('/registradminoexitoso', [UserController::class, 'storeAdmin'])->name('admin.store');
//Iniciar sesión
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/loginexitoso', [UserController::class, 'storeLogin'])->name('login.store');
//Cerrar sesión
Route::get('cerrarsesión', [UserController::class, 'logout'])->name('logout');
//Middleware
Route::group(['middleware' => 'redirecionTipoUsuario'], function() {

});
//Para  subir un libro
Route::get('/subirlibro', [BookController::class, 'create'])->name('subirlibro');
Route::post('/subirlibroexitoso', [BookController::class, 'store'])->name('libro.store');
//Para ver el libro clikeado
Route::get('/libro/{id}', [BookController::class,'show'])->name('libro.show');
//Ver libros descargados
Route::get('/librosdescargados/{book}', [DownloadController::class, 'librosDescargados'])->name('libros.descargados');
Route::get('/downloads', [DownloadController::class, 'showLibrosDescargados'])->name('show.librosdescargados');
//Filtro por genero
Route::get('/libros/{genero}', [BookController::class,'filtrarPorGenero'])->name('libros.por.genero');
//Libros gratis
Route::get('/librosgratis', [BookController::class,'indexGratis'])->name('libros.gratis');
//Libros de paga
Route::get('/librosdepaga', [BookController::class,'indexPaga'])->name('libros.pago');