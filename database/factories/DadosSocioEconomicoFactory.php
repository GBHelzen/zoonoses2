<?php

namespace Database\Factories;

use App\Models\DadosSocioEconomico;
use Illuminate\Database\Eloquent\Factories\Factory;

class DadosSocioEconomicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DadosSocioEconomico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'renda_familiar' => '1500',
            'pessoas_em_domicilio' => '7',
            'participa_programa_social' => false,

            
            'quantidade_cachorro_macho' => '1',
            'quantidade_cachorro_femea' => '1',
            'quantidade_cachorro_total' => '2',

            'quantidade_gato_macho' => '1',
            'quantidade_gato_femea' => '1',
            'quantidade_gato_total' => '2',

            'pessoa_id' => '',


        ];
    }
}
