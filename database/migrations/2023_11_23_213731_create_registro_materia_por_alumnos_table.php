<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registro_materia_por_alumno', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('materia_id')->constrained('materia')->onDelete('cascade');
            $table->foreignId('alumno_id')->constrained('alumno')->onDelete('cascade');
            $table->enum('estado',['aprobado', 'desaprobado', 'regular', 'libre']);
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_materia_por_alumno');
    }
};
