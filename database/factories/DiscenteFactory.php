<?php

namespace Database\Factories;

use App\Models\Discente;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discente::class;

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
                'Instituicao' =>   $this->faker->sentence($nbWords = 10, $variableNbWords = true),
                'NomeDisciplina'  => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
                'Nota' => $this->faker->numberBetween(10,10),
                'Credito' => $this->faker->numberBetween(0, 99999999),
                'CargaHoraria' => $this->faker->numberBetween(0, 99999999),
                'Codigo' => $this->faker->numberBetween(0, 99999999),
                'NomeUsp' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
               // 'user_id' => User::factory()->create()->id
            ];
    }
}
