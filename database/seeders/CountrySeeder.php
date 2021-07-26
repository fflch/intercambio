<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = [   
            'nome'=> 'Australia',
        ];
        
        Country::create($country);
        Country::factory(10)->create();
    }
}
