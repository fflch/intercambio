<?php

namespace Database\Factories;

use App\Models\Instituicao;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstituicaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instituicao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_instituicao' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'country_id'       => Country::factory()->create()->id,
        ];
    }
}
