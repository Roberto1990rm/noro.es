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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la noticia
            $table->string('subtitle')->nullable(); // Subtítulo de la noticia (opcional)
            $table->text('content'); // Contenido de la noticia
            $table->string('image')->nullable(); // Ruta de la imagen relacionada (opcional)
            $table->enum('category', [
                'espana' => 'España',
                'internacional' => 'Mundo',
                'politica' => 'Política',
                'covid' => 'Covid 2.0',
                'agenda2030' => 'Agenda2030',
                'lgtbiq+' => 'LGTBIQ+',
                'corrupcion' => 'Corrupción',
                'autoritarismo' => 'Autoritarismo',
                'inmigracion' => 'Inmigración',
                'europa' => 'Europa',
            ]);
            
            $table->boolean('published_at')->default(0);

            $table->timestamps(); // Fecha de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
