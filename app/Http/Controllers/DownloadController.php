<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Book;


class DownloadController extends Controller
{
    public function descargarLibro($idLibro)
{
    // Obtener el usuario autenticado
    $user = auth()->user();

    // Crear una nueva instancia de Download
    $descarga = new Download();

    // Asignar los valores necesarios
    $descarga->user_id = $user->id;
    $descarga->book_id = $idLibro; // Aquí asumimos que $idLibro es el ID del libro que se está descargando

    // Guardar la descarga en la base de datos
    $descarga->save();

    // Redirigir o devolver una respuesta adecuada
}

public function librosDescargados($bookId)
{
   // Obtener el libro de la base de datos
   $book = Book::findOrFail($bookId);
   

   // Registrar la descarga en la base de datos
   $download = new Download();
   $download->user_id = Auth::id(); // Obtener el ID del usuario autenticado
   $download->book_id = $book->id;
   $download->save();

   // Iniciar la descarga del archivo
   $fileUrl = $book->url;
   $fileContent = file_get_contents($fileUrl);

   if ($fileContent === false) {
    // Si no se pudo obtener el contenido del archivo, muestra un mensaje de error
    return response()->json(['error' => 'No se pudo descargar el archivo'], 500);
}

   $headers = [
       'Content-Type' => 'application/pdf',
       'Content-Disposition' => 'attachment; filename="' . $book->name . '.pdf"',
   ];

   return response()->make(file_get_contents($fileUrl), 200, $headers);
}





public function showLibrosDescargados()
{
    $user = Auth::user();
    
    $downloads = $user->downloads; // Obtener las descargas del usuario

    return view('Users.misLibros', compact('downloads'));
}

}
