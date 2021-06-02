<?php

namespace Database\Factories;

use App\Models\Disciplina;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        $status_key = array_rand(Disciplina::status);
        $status_key = array_rand(Disciplina::tipos);

        return [
            'tipo'          => Disciplina::tipos[$status_key],
            'nome'          => $this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'nota'          => $this->faker->numberBetween(0, 10),
            'creditos'      => $this->faker->numberBetween(0, 99999999), 
            'carga_horaria' => $this->faker->numberBetween(0, 99999999),
            #'codigo'        => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'pedido_id'     => Pedido::factory()->create()->id,
        ];
    }
}
