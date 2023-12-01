<?php

namespace Database\Factories;

use App\Models\CategoriaServico;
use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoria = CategoriaServico::where('slug', CategoriaServico::CASTRACAO)->first();

        return [
            'data_solicitacao' => $this->faker->dateTimeBetween('2021-01-01', '2021-02-10'),
            'pessoa_id' => '',
            'animal_id' => '',
            'categoria_id' => $categoria->id,
            'status' => $this->faker->randomElement(['aguardando', 'cancelado', Servico::CONFIRMADO])
        ];
    }
}
