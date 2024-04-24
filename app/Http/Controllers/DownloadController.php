<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Book;


class DownloadController extends Controller
{
//     public function descargarLibro($idLibro)
// {
//     // Obtener el usuario autenticado
//     $user = auth()->user();

//     // Crear una nueva instancia de Download
//     $descarga = new Download();

//     // Asignar los valores necesarios
//     $descarga->user_id = $user->id;
//     $descarga->book_id = $idLibro; // Aquí asumimos que $idLibro es el ID del libro que se está descargando

//     // Guardar la descarga en la base de datos
//     $descarga->save();

//     // Redirigir o devolver una respuesta adecuada
// }

public function librosDescargados($bookId)
{
    // Obtener el libro de la base de datos
    $book = Book::findOrFail($bookId);

    // Registrar la descarga en la base de datos
    $download = new Download();
    
    // Obtener el ID del usuario autenticado
    $download->user_id = Auth::id(); 
    $download->book_id = $book->id;
    $download->save();

    $fileUrl = $book->url;
    $file = fopen($fileUrl, 'rb');
    $headers = [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="' . rawurlencode($book->name) . '.pdf"',
    ];
    
    

    return response()->stream(function () use ($file) {
        fpassthru($file);
    }, 200, $headers);
}




public function showLibrosDescargados()
{
    $user = Auth::user();
    
    // Obtener las descargas del usuario
    $downloads = $user->downloads; 

    return view('Users.misLibros', compact('downloads'));
}

}
