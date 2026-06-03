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
        Schema::create('notificacion_reglas', function (Blueprint $table) {
            $table->id();
            $table->enum('sexo', ['Masculino', 'Femenino', 'Todos']);

            $table->integer('edad_meses');

            $table->string('titulo');

            $table->text('mensaje');

            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion_reglas');
    }
};
