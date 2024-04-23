<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function create()
    {   
        
        return view('registro');
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required',
        
        ]);

         // Crear una nueva instancia de usuario
            $usuario = new User;

            // Asignar los valores
           
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            $usuario->password = bcrypt($request->input('password')); 
            $usuario->role = $request->input('role');

            // Guardar el usuario
            $usuario->save();

            // Redirigir a la ruta de inicio de sesión con un mensaje de éxito
            return redirect()->route('login')->with('success', 'Usuario Registrado Exitosamente');
        
    }

    public function login(){
      
        return view('inicioSesion');

    }

      // Validar Datos e Iniciar Sesion
    public function storeLogin(Request $request)
    {
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return redirect()->intended('/');
        }
        else
        {
            return redirect()->back()->with('success', 'Revise bien sus datos, al parecer están incorrectos');
        }
    
          
    }

     // funcion para salir de la sesion
     public function logout(Request $request)
     {
         Auth::guard('web')->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return to_route('index.principal')
         ->with('success','Has cerrado sesión correctamente.');
     }
}
