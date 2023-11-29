<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';

    protected $fillable = [
        'nombre_materia',
        'horas_cursado',
        'duracion',
        'carrera_id',
    ];

    public function carrera(){
        return $this -> belongsTo(Carrera::class);
    }

    public function registroMateria(){
        return $this -> hasMany(RegistroMateriaPorAlumno::class, 'materia_id', 'id');
    }
}
