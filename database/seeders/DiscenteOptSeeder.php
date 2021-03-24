<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiscenteOpt;

class DiscenteOptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discenteOpt = [   
            'Nome'=> 'Andre Felipe',
            'nUSP'=> 11838478,
            'Curso'=> 'Ciencias Sociais',
            'Periodo' => '2019',
            'Instituicao'=> 'Harvard',
            'NomeDisciplina'=> 'Marcenaria',
            'DataInicial'=> '2018-09-28',
            'DataFinal' => '2019-09-28',
            'Credito'=> 100,
            'CargaHoraria'=> 100,
            'Modalidade'=> 'Livre'     
        ];
        
        DiscenteOpt::create($discenteOpt);
        DiscenteOpt::factory(10)->create();
    }
}
