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
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->integer('dni');
            $table->string('telefono', 50);
            $table->integer('legajo');
            $table->enum('estado', ['activo', 'inactivo']);
            $table->foreignId('carrera_id')->constrained('carrera')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno');
    }
};
