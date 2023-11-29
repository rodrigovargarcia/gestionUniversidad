<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroMateriaPorAlumno extends Model
{
    protected $table = 'registro_materia_por_alumno';

    protected $fillable = [
        'materia_id',
        'alumno_id',
        'estado',
        'fecha',
    ];

    public function materia(){
        return $this -> belongsTo(Materia::class);
    }

    public function alumno(){
        return $this -> belongsTo(Alumno::class);
    }
}
