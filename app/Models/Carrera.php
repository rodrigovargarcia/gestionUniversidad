<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    protected $fillable = [
        'nombre',
        'duracion_anios',
    ];

    public function alumnos(){
        return $this -> hasMany(Alumno::class);
    }

    public function materias(){
        return $this -> hasMany(Materia::class);
    }
}
