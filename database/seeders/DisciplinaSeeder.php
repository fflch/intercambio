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
            'pedido_id'     => 1,
        ];
        
        $disciplina = Disciplina::create($disciplina);
        $disciplina->setStatus('Em elaboração');
        $disciplina->save();
        Disciplina::factory(10)->create();
    }
}
