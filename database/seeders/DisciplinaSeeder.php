<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disciplina;
use App\Models\Pedido;
use App\Models\User;
use Faker\Factory;
use Auth;
use Illuminate\Http\UploadedFile;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_key = array_rand(Disciplina::tipos);
        $faker = Factory::create();
        $file = UploadedFile::fake()->create($faker->text(20) .'pdf');
        $pedido = Pedido::inRandomOrder()->first();

        $disciplina = [  
            'tipo'          => Disciplina::tipos[$tipos_key],
            'nome'          => $faker->sentence($nbWords = 8, $variableNbWords = true),
            'nota'          => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000), 
            'creditos'      => $faker->numberBetween(0, 1000), 
            'carga_horaria' => $faker->numberBetween(0, 1000),
            'original_name' => $file->getClientOriginalName(),
            'path'          => $file->store('.'),
            'conversao'     => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'pedido_id'     => $pedido->id,
        ];

    
        if(Disciplina::tipos[$tipos_key] == "Obrigatória")
        {
            $obg = [
                'codigo' => $faker->sentence($nbWords = 1, $variableNbWords = true),
                //TODO nome aleatorio, fazer uma busca pelo replicado
        ];
            $disciplina = array_merge($disciplina,$obg);
        } 
        
        $disciplina = Disciplina::create($disciplina);
        
        $user = User::where('id',$pedido->user_id)->first();
        Auth::login($user);
        $disciplina->setStatus('Em elaboração');
        Auth::logout();
        $disciplina->save();
        

        $pedidos = Pedido::all();
        foreach($pedidos as $pedido){
            $user = User::where('id',$pedido->user_id)->first();
            $disciplinas = Disciplina::factory(3)->create();
                foreach($disciplinas as $disciplina){
                    Auth::login($user);
                    $disciplina->setStatus('Em elaboração');
                    Auth::logout();
                    $disciplina->save();
                }
            }
        
    }
}
