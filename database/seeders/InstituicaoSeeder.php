<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Instituicao;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instituicao = [   
            'nome_instituicao' => 'PUC',
            'country_id'       => Country::inRandomOrder()->pluck('id')->first(),
        ];
        
        Instituicao::create($instituicao);
        Instituicao::factory(10)->create();
    }
}
