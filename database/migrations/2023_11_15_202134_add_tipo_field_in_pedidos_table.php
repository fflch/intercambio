<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pedido;

class AddTipoFieldInPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('tipo')->nullable();
        });

        // Vamos deixar todos pedidos retroativos com o tipo Regular
        $pedidos =  Pedido::all();
        foreach($pedidos as $pedido){
            $pedido->tipo = 'Regular';
            $pedido->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            //
        });
    }
}
