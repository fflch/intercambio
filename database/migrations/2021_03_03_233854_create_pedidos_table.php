<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('instituicao');
            $table->string('original_name');
            $table->string('path');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            # Campos gerenciados pelo observer
            $table->string('status');
            $table->string('curso');
            $table->string('nome');
            $table->string('codpes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
