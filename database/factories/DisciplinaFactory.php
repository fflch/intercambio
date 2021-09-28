<?php

namespace Database\Factories;

use App\Models\Disciplina;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use App\Service\Utils;

class DisciplinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disciplina::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $tipos_key = array_rand(Disciplina::tipos);
        $file = UploadedFile::fake()->create($this->faker->text(20) .'pdf');
        $pedido = Pedido::inRandomOrder()->first();

        $disciplina = [  
            'tipo'          => Disciplina::tipos[$tipos_key],
            'nome'          => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'nota'          => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000), 
            'creditos'      => $this->faker->numberBetween(0, 1000), 
            'carga_horaria' => $this->faker->numberBetween(0, 1000),
            'original_name' => $file->getClientOriginalName(),
            'path'          => $file->store('.'),
            'conversao'     => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'pedido_id'     => $pedido->id,
        ];
   
        if(Disciplina::tipos[$tipos_key] == "Obrigatória")
        {
            $user = User::where('id',$pedido->user_id)->first();
            $disciplinas = Utils::disciplinas($user->codpes);
            
            $obg = ['codigo' => $disciplinas[array_rand($disciplinas)]['coddis']];
            $disciplina = array_merge($disciplina,$obg);
        } 
        return $disciplina;
    }
}
