<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'endereco' => $this->faker->streetAddress,
            'bairro' => $this->faker->streetSuffix,
            'cidade' => $this->faker->cityPrefix,
            'cep' => $this->faker->postcode,
            'numero' => '000',


        ];
    }
}
