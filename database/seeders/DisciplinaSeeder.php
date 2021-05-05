<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disciplina;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplina = [   
            'tipo'          => Disciplina::tipo[0],
            'nome'          => 'Progamação II',
            'nota'          => '10',
            'creditos'      => '40', 
            'carga_horaria' => '25',
            'codigo'        => 'FLA0205',
            'status'        => Disciplina::status[0],
            'pedido_id'     => 1,
        ];
        
        Disciplina::create($disciplina);
        Disciplina::factory(10)->create();
    }
}
