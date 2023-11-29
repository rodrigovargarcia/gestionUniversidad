<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'legajo',
        'estado',
        'carrera_id',
    ];

    public function carrera(){
        return $this -> belongsTo(Carrera::class);
    }

    public function registroMateria(){
        return $this -> hasMany(RegistroMateriaPorAlumno::class);
    }
}
