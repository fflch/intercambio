<?php

namespace Database\Factories;

use App\Models\DiscenteOpt;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscenteOptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiscenteOpt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nome' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'nUSP'   => $this->faker->numberBetween(0, 99999999),
            'Curso'  =>   $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'Periodo' =>   $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'Instituicao' =>   $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'NomeDisciplina'  => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'DataInicial' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'DataFinal' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'Credito' => $this->faker->numberBetween(0, 99999999),
            'CargaHoraria' => $this->faker->numberBetween(0, 99999999),
            'Modalidade' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            
        ];
    }
}
