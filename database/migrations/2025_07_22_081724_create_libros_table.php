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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->text('descripcion');// Descripción del libro
            $table->string('pdf_url')->nullable(); // Aquí se guarda el enlace al PDF
            $table->string('img_url')->nullable(); // Aquí se guarda el enlace a la imagen del libro
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
