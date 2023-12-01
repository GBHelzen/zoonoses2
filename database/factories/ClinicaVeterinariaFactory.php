<?php

namespace Database\Factories;

use App\Models\ClinicaVeterinaria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicaVeterinariaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClinicaVeterinaria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'telefone' => '(99) 99999-9999',
            'endereco_id' => '',             
        ];
    }
}
