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
        $file = UploadedFile::fake()->create('ArquivoDoSeeder' .'pdf');
        $pedido = Pedido::inRandomOrder()->first();

        $disciplina = [  
            'tipo'          => 'Optativa Livre',
            'nome'          => 'Filosofia I',
            'nota'          => 7.0,
            'creditos'      => 10, 
            'carga_horaria' => 10,
            'original_name' => $file->getClientOriginalName(),
            'path'          => $file->store('.'),
            'conversao'     => 10,
            'pedido_id'     => $pedido->id,
        ];
        
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
