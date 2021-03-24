<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discentes', function (Blueprint $table) {
            $table->id();   
            $table->string('Nome');
            $table->integer('nUSP');
            $table->string('Curso');
            $table->string('Instituicao');
            $table->string('NomeDisciplina');
            $table->float('Nota');
            $table->integer('Credito');
            $table->integer('CargaHoraria');
            $table->string('Codigo');
            $table->string('NomeUsp');
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
        Schema::dropIfExists('discentes');
    }
}
