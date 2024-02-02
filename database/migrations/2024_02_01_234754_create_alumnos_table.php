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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellido',50);
            /*
            TODO: ->unique(); hace que la cedula sea unica, deberia ser agregado en el modelo
            TODO: pero se especifico de que se respetara las entidades propuestas
            */
            $table->string('cedula',10);
            $table->date('nacimiento');
            $table->tinyInteger('edad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
