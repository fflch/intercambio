<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->string('autorizacao');
            $table->string('visto_info');
            $table->string('bancaria_info');
            $table->string('seguro_info');
            $table->string('passagem_info');
            $table->string('moradia_universidade_info');
            $table->string('bagagem_info');
            $table->string('preparo_info');
            $table->string('registro_chegada_info');
            $table->string('abrir_conta_info');
            $table->string('chip_info');
            $table->string('moradia_info');
            $table->string('transportepublico_info');
            $table->string('orientacao_info');
            $table->string('curso_idioma_info');
            $table->string('matricula_materia_info');
            $table->string('RU_info');
            $table->string('taxa_info');
            $table->string('exp_academica_info');
            $table->string('usp_ifriend_info');
            $table->string('dificuldade_aula_info');
            $table->string('adaptacao_info');
            $table->string('dificuldade_info');
            $table->string('integracao_info');
            $table->string('bolsa_info');
            $table->string('gasto_medio_info');
            $table->string('atividade_remunerada_info');
            $table->string('dica_info');
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
        Schema::dropIfExists('formularios');
    }
}
