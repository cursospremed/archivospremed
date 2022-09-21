<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id('ID');
            $table->integer('aciertos')->nullable();
            $table->integer('preguntas')->nullable();
            $table->string('resultado',45);
            $table->date('fecha');
            $table->unsignedBigInteger('examen_id');
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('examen_id')->references('id')->on('examenes');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
};
