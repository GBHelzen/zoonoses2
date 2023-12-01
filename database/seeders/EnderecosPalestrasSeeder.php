<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecosPalestrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecos = [
            [
                'endereco' => ' Av. Centenário',
                'complemento' => 'Unidade de Vigilância e Controle de Zoonoses-UVCZ',
                'bairro' => 'Centenário',
                'cep' => '69.312-377',
                'numero' => '469',
                'is_local_palestra' => true
            ],
            [
                'endereco' => ' General Penha Brasil',
                'complemento' => 'Palácio 9 de Julho ',
                'bairro' => 'São Francisco',
                'cep' => '69305-130',
                'numero' => '1011',
                'is_local_palestra' => true
            ],
            [
                'endereco' => ' Av. Glaicon de Paiva ',
                'complemento' => 'Teatro Escola Municipal ',
                'bairro' => ' São Vicente',
                'cep' => '69304-360',
                'numero' => '900',
                'is_local_palestra' => true
            ],
            [
                'endereco' => 'Av. Surumu',
                'complemento' => 'Secretaria Municipal de Tecnologia e Inclusão Digital - SMTI',
                'bairro' => 'Bairro Mecejana',
                'cep' => '69304-360',
                'numero' => '2128',
                'is_local_palestra' => true
            ],
            [
                'endereco' => 'Av. Capitão Júlio Bezerra',
                'complemento' => 'Secretaria Municipal de Segurança, Urbano e Transito - SMST',
                'bairro' => '31 de Março',
                'cep' => '69.305-010',
                'numero' => '1481',
                'is_local_palestra' => true
            ],
        ];

        foreach ($enderecos as $endereco) {
            Endereco::firstOrCreate($endereco);
        }
    }
}
