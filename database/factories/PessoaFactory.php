<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rg' => $this->faker->rg,
            'rg_uf' => 'SSP/RR',
            'nascimento' => $this->faker->dateTimeBetween('1980-01-01', '2002-12-31'),
            'telefone' => '99 9999 9999',
            'email' => $this->faker->unique()->safeEmail,
            'finalizou_cadastro_pessoa' => true,
            'user_id' => '',
            'endereco_id' => '',
        ];
    }
}
