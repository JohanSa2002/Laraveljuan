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
        Schema::create('trabajo_academicos', function (Blueprint $table) {
            $table->id();

            // Relación con usuarios
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Campos del trabajo
            $table->string('titulo');
            $table->string('autor');
            $table->year('anio');
            $table->string('asesor')->nullable();

            // Estado del trabajo
            $table->enum('estado', [
                'en_revision',
                'aceptado_revision',
                'aprobado'
            ])->default('en_revision');

            // Lugar donde se sube
            $table->string('lugar');

            // Ruta del archivo PDF
            $table->string('ruta_pdf');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajo_academicos');
    }
};
