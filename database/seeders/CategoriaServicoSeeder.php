<?php

namespace Database\Seeders;

use App\Models\CategoriaServico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nome = 'Castração';

        $categoria = CategoriaServico::firstOrCreate([
            'nome' => $nome,
            'descricao' => 'Serviço de castração realizado pelo centro de zoonoses de Boa Vista em parceria com clínicas conveniadas',
            'slug' => Str::slug($nome, '-')
        ]);
    }
}
