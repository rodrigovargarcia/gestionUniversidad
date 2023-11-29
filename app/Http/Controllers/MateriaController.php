<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index(){
        $materia = Materia::all();
        return $materia;
    }

    public function show(Materia $materia){
        return $materia;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nombre_materia' =>['string', 'required', 'max:50'],
            'horas_cursado' =>['integer', 'required'],
            'duracion' =>['required', 'in:cuatrimestral, anual'],
            'carrera_id' => ['required', 'exists:carrera,id'],
        ]);

        $obj = Materia::create([
            'nombre_materia' => $request -> nombre_materia,
            'horas_cursado' => $request -> horas_cursado,
            'duracion' => $request -> duracion,
            'carrera_id' => $request -> carrera_id,
        ]);
        return $obj;
    }

    public function update(Materia $materia, Request $request){
        $validate = $request -> validate([
            'nombre_materia'=> ['string','sometimes', 'max:50'],
            'horas_cursado' =>['integer', 'sometimes'],
            'duracion' =>['sometimes', 'in:cuatrimestral, anual'],
            'carrera_id' => ['sometimes', 'exists:carrera,id'],
        ]);

        $materia-> update($request -> all());
        return $materia;
    }

    public function destroy(Materia $materia){
        $materia -> delete();
        return 'Materia eliminada correctamente';
    }
}
