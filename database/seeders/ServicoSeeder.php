<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\ClinicaVeterinaria;
use App\Models\DadosSocioEconomico;
use App\Models\Endereco;
use App\Models\Pessoa;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CategoriaServicoSeeder::class]);

        User::factory(10)->create()->each(function ($user) {
            $endereco = Endereco::factory()->create();

            $pessoa =  Pessoa::factory()->create(['user_id' => $user->id, 'endereco_id' => $endereco->id]);

            DadosSocioEconomico::factory()->create(['pessoa_id' => $pessoa->id]);

            Animal::factory()->create(['pessoa_id' => $pessoa->id])->each(function ($animal) use ($pessoa) {
                Servico::factory()->create(['animal_id' => $animal->id, 'pessoa_id' => $pessoa->id]);
            });
        });

        $endereco = Endereco::factory()->create();
        ClinicaVeterinaria::factory(3)->create(['endereco_id' => $endereco->id]);
    }
}
