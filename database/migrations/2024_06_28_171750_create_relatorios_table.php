<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->string('autorizacao');
            $table->string('periodo');
            $table->text('pescolhadestino');
            $table->text('pvisto');
            $table->text('questoesbancarias');
            $table->boolean('segurosaude')->default(false);
            $table->text('segurosauderec')->nullable();
            $table->boolean('passagens')->default(false);
            $table->text('passagensrec')->nullable();
            $table->boolean('oferecimentomoradia')->default(false);
            $table->boolean('moradia')->default(false);
            $table->text('moradiarexp')->nullable();
            $table->boolean('moradiaqnt')->default(false);
            $table->boolean('proximidade')->default(false);
            $table->text('moradiafora')->nullable();
            $table->text('prepbagagem');
            $table->text('conhecimentoprevio');
            $table->boolean('registro')->default(false);
            $table->text('registroexp')->nullable();
            $table->boolean('contabancaria')->default(false);
            $table->text('contabancariaexp')->nullable();
            $table->boolean('chip')->default(false);
            $table->text('chipexp')->nullable();
            $table->boolean('transportepublico')->default(false);
            $table->boolean('descontotransportepublico')->default(false);
            $table->text('descontotransportepublicoexp')->nullable();
            $table->text('orientacao');
            $table->text('orientacaoexp')->nullable();
            $table->boolean('cursoidioma')->default(false);
            $table->boolean('cursoidiomagratuidade')->default(false);
            $table->string('cursoidiomavalor')->nullable();
            $table->text('matricula');
            $table->boolean('aulasantes')->default(false);
            $table->boolean('restauranteuniversitario')->default(false);
            $table->text('restauranteuniversitariovalor')->nullable();
            $table->boolean('restauranteacessivel')->default(false);
            $table->boolean('taxaadm')->default(false);
            $table->text('taxaadmexp')->nullable();
            $table->text('expacademica');
            $table->boolean('programaamizade')->default(false);
            $table->text('programaamizadeexp')->nullable();
            $table->boolean('dificuldadeacompanhamento')->default(false);
            $table->text('dificuldadeacompanhamentoexp')->nullable();
            $table->boolean('dificuldadeidioma')->default(false);
            $table->text('dificuldadeidiomaexp')->nullable();
            $table->text('adaptacao');
            $table->text('dificuldades');
            $table->boolean('atvintegracao')->default(false);
            $table->text('atvintegracaoexp')->nullable();
            $table->boolean('bolsa')->default(false);
            $table->text('bolsasuf')->nullable();
            $table->text('gastomensal');
            $table->boolean('atvremunerada')->default(false);
            $table->text('atvremuneradaexp')->nullable();
            $table->text('dicas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios');
    }
}

