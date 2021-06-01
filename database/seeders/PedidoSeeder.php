<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido = [   
            'instituicao'=> 'FFLCH',   
            'user_id'  => 1,
        ];
        
        Pedido::create($pedido);
        Pedido::factory(10)->create();
    }
}
