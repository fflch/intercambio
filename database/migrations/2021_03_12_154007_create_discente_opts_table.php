<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscenteOptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discente_opts', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->integer('nUSP');
            $table->string('Curso');
            $table->string('Periodo');
            $table->string('Instituicao');
            $table->string('NomeDisciplina');
            $table->date('DataInicial');
            $table->date('DataFinal');
            $table->integer('Credito');
            $table->integer('CargaHoraria');
            $table->string('Modalidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discente_opts');
    }
}
