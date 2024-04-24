<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
                'name' => 'required|string',
                'author' => 'required|string',
                'publication_year' => 'required|int',
                'genre' => 'required',
                'price' => 'required|numeric',
                'synopsis' => 'required|string',
                'image' => 'required',
                'url' => 'required|url',
            
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del libro es obligatorio.',
            'name.string' => 'El nombre del libro debe ser texto.',
            'author.required' => 'El nombre del autor es obligatorio.',
            'author.string' => 'El nombre del autor debe ser texto.',
            'publication_year.required' => 'El año de publicacion es requerido.',
            'publication_year.int' => 'El año de publicacion debe ser un numero entero.',
            // 'publication_year.max' => 'El año de publicacion debe tener máximo cuatro numeros.',
            'genre.required' => 'El género es obligatorio.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'synopsis.required' => 'La sinopsis debe ser obligatoria.',
            'synopsis.string' => 'La sinopsis debe ser texto.',
            'image.required' => 'La foto debe ser obligatoria',
            'url.required' => 'El link de descarga es obligatorio',
            'url.url' => 'El link de descarga debe de ser una url',
        ];
    }
}
