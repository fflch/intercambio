<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo');
            $table->string('nome');
            $table->float('nota');
            $table->float('creditos');
            $table->integer('carga_horaria');
            $table->string('codigo')->nullable();
            $table->string('original_name')->nullable();
            $table->string('path')->nullable();
            $table->float('conversao')->nullable();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
