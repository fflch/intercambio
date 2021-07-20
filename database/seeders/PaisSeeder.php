<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais = [   
            'nome'=> 'Australia',
        ];
        
        Pais::create($pais);
        Pais::factory(10)->create();
    }
}
