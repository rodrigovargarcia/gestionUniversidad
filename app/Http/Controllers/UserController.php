<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $usuario = User::all();
        return $usuario;
    }

    public function show(Request $usuario){
        return $usuario;
    }

    public function store(Request $request){
        $validate = $request -> validate([
            'name' => ['string', 'required'],            
            'email' => ['string', 'required'],
            'password' => ['string', 'required'],            
        ]);

        $obj = User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
        ]);

        return $obj;
    }

    public function update(User $usuario, Request $request){
        $validate = $request -> validate([
            'name' => ['string', 'sometimes'] ,            
            'email' => ['string', 'sometimes'],
            'password' => ['string', 'sometimes'],            
        ]);

        $usuario -> update($request->all());
        return $usuario;
    }

    public function destroy(User $usuario){
        $usuario->delete();
        return 'Usuario eliminado correctamente';
    }
}
