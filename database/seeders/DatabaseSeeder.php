<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123rodrigo',
        ]);

        \App\Models\Carrera::create([
            'nombre' => 'Ing Software',
            'duracion_anios' => 5,
        ]);

        \App\Models\Alumno::create([
            'nombre' => 'Fulano',
            'apellido' => 'Perez',
            'dni' => 1,
            'telefono' => '+543855000000',
            'legajo' => 1,
            'estado' => 'activo',
            'carrera_id' => 1,
        ]);

        \App\Models\Materia::create([
            'nombre_materia' => 'Base de datos',
            'horas_cursado' => 4,
            'duracion' => 'cuatrimestral',
            'carrera_id' => 1,
        ]);

        \App\Models\RegistroMateriaPorAlumno::create([
            'materia_id' => 1,
            'alumno_id' => 1,
            'estado' => 'aprobado',
            'fecha' => '2023-08-24',
        ]);
    }
}
