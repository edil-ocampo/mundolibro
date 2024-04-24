<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use App\Models\Download;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class BookController extends Controller
{

    public function index()
    {
        $libros = Book::all();
        return view('index', compact('libros'));
    }


    public function filtrarPorGenero($genero)
    {
        // Validar que el género proporcionado es válido
        $generosValidos = [
            'Romance', 'Aventura', 'Ciencia ficción', 'Fantasía', 'Terror',
            'Poesía', 'Novela', 'Cuentos', 'Ensayos', 'Historia', 'Política',
            'Biografía', 'Infantil', 'Filosofía'
        ];

        if (!in_array($genero, $generosValidos)) {
            return redirect()->route('index.principal')->with('error', 'Género no válido');
        }

        // Filtrar libros por género
        $libros = Book::where('genre', $genero)->get();

        
        return view('indexPorGenero', ['libros' => $libros, 'genero' => $genero]);
    }

    public function indexGratis()
    {   
        //Se obtienen todos los libros y crea una variable para especificar los libros gratuitos 
        $libros = Book::all();
        $libroGratis = Book::where('price' , 0)->get();

        return view('librosGratis', compact('libroGratis', 'libros'));
    }

    public function indexPaga()
    {   
        //Se obtienen todos los libros y crea una variable para especificar los libros de paga 
        $libros = Book::all();
        $libroPaga = Book::where('price' , !0)->get();

        return view('librosPaga', compact('libroPaga','libros'));
    }

    public function show($id)
    {
        // Obtener el libro por su ID
        $libro = Book::findOrFail($id); 
        return view('verLibro', compact('libro'));
    }


    public function create()
    {
        return view('Admin.subirLibro');
    }

    public function store(CreateBookRequest $request)
    {
        //logica para el registro y ruta de la imagen
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/libros/'), $imageName);
            $urllibro = asset('img/libros/' . $imageName);
        } else {
            $urllibro = "";
        }

        $libro = new Book;

        $libro->name = $request->input('name');
        $libro->author = $request->input('author');
        $libro->publication_year = $request->input('publication_year');
        $libro->genre = $request->input('genre');
        $libro->price = $request->input('price');
        $libro->synopsis = $request->input('synopsis');
        $libro->image = $urllibro;
        $libro->url = $request->input('url');

        $libro->save();

        return redirect()->route('subirlibro')->with('success', 'Libro Registrado Exitosamente');
    }

   

 
}
