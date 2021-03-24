<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discente;

class DiscenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discente = [   
            'Nome'=> 'Andre Felipe',
            'nUSP'=> 11838478,
            'Curso'=> 'Ciencias Sociais',
            'Instituicao'=> 'FFLCH',
            'NomeDisciplina'=> 'Marcenaria',
            'Nota'=> 1.1,
            'Credito'=> 100,
            'CargaHoraria'=> 100,
            'Codigo'=> 1025410,
            'NomeUsp'=> 'Marcenaria USP'     
        ];
        
        Discente::create($discente);
        Discente::factory(10)->create();
    }
}
