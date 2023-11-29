<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    //Muestra todas las carreras
    public function index(){
        $carrera = Carrera::all();
        return $carrera;
    }

    public function show(Carrera $carrera){
        return $carrera;
    }

    //Realiza un POST en la tabla (agrega un registro)
    public function store(Request $request){
        $validated = $request-> validate ([
            'nombre' => ['string', 'required', 'max:50'],
            'duracion_anios'=>['integer', 'required'],
        ]);

        $obj = Carrera::create([
            'nombre' => $request -> nombre,
            'duracion_anios' => $request -> duracion_anios,
        ]);
        return $obj;
    }


    //Realiza un PUT, modifica un registo en la tabla con su ID
    public function update(Carrera $carrera, Request $request){
        $validated = $request -> validate([
            'nombre'=>['string', 'sometimes', 'max:50'],
            'duracion_anios'=>['integer', 'sometimes'],
        ]);

        $carrera -> update($request -> all());
        return $carrera;
    }

    public function destroy(Carrera $carrera){
        $carrera->delete();
        return 'Carrera eliminada correctamente';
    }
}
