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
        Schema::create('materia', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre_materia',50);
            $table->integer('horas_cursado');
            $table->enum('duracion',['cuatrimestral', 'anual']);
            $table->foreignId('carrera_id')->constrained('carrera')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia');
    }
};
