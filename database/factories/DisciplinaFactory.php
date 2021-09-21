<?php

namespace Database\Factories;

use App\Models\Disciplina;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

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

        $disciplina = [  
            'tipo'          => Disciplina::tipos[$tipos_key],
            'nome'          => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'nota'          => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000), 
            'creditos'      => $this->faker->numberBetween(0, 1000), 
            'carga_horaria' => $this->faker->numberBetween(0, 1000),
            'original_name' => $file->getClientOriginalName(),
            'path'          => $file->store('.'),
            'conversao'     => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'pedido_id'     => Pedido::inRandomOrder()->pluck('id')->first(),
        ];

    
        if(Disciplina::tipos[$tipos_key] == "Obrigatória")
        {
            $obg = [
                'codigo' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
                //TODO nome aleatorio, fazer uma busca pelo replicado
        ];
            $disciplina = array_merge($disciplina,$obg);
        } 
        return $disciplina;
    }
}
