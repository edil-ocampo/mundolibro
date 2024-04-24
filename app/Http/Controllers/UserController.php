<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
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

    public function store(CreateUserRequest $request)
    {
            
        $usuario = new User;

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password')); 
        $usuario->role = $request->input('role');

        
        $usuario->save();

        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Adelante, inicia sesión');
        
    }

    
    public function createAdmin()
    {   
        
        return view('Admin.registroAdmin');
    }

    public function storeAdmin(CreateUserRequest $request)
    {
            
        $usuario = new User;

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password')); 
        $usuario->role = $request->input('role');

        
        $usuario->save();

        return redirect()->route('registro.admin')->with('success', 'Administrador creado correctamente');
        
    }


    public function login(){
      
        return view('inicioSesion');

    }

      
    public function storeLogin(Request $request)
    {
        //se valida que los datos almacenados sean veridicos con los digitados
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return redirect()->intended('/');
        }
        else
        {
            return redirect()->back()->with('success', 'Revise bien sus datos, al parecer están incorrectos');
        }
    
          
    }

     
     public function logout(Request $request)
     {
         Auth::guard('web')->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return to_route('index.principal')
         ->with('success','Has cerrado sesión correctamente.');
     }
}
