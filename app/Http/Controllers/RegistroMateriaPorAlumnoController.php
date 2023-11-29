<?php

namespace App\Http\Controllers;

use App\Models\RegistroMateriaPorAlumno;
use Illuminate\Http\Request;

class RegistroMateriaPorAlumnoController extends Controller
{
    public function index(){
        $registro = RegistroMateriaPorAlumno::all();
        return $registro;
    }

    public function show(RegistroMateriaPorAlumno $registro){
        return $registro;
    }

    public function store(Request $request){
        $validate = $request->validate([
            'materia_id' => ['required', 'exists:materia,id'],
            'alumno_id' => ['required', 'exists:alumno,id'],
            'estado'=>['required', 'in:aprobado, desaprobado, regular, libre'],
            'fecha'=>['required', 'date'],
        ]);

        $obj = RegistroMateriaPorAlumno::create([
            'materia_id'=> $request -> materia_id,
            'alumno_id'=> $request -> alumno_id,
            'estado'=> $request -> estado,
            'fecha'=> $request -> fecha,
        ]);
        return $obj;
    }
}
