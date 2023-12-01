<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\ClinicaVeterinaria;
use App\Models\Pessoa;
use App\Models\Servico;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServicoController extends Controller
{
    /**
     * Imprime uma guia de serviço
     */
    public function imprimirGuia(Servico $servico, ClinicaVeterinaria $clinica)
    {
        $pessoa = $servico->pessoa ?? $servico->ong->responsavel;

        $clinica = $clinica;

        $clinicaEndereco = $clinica->endereco;

        $animal = $servico->animal;

        $raca = $servico->animal->racaNome()->first();

        $user = $servico->pessoa->user ?? $servico->ong->responsavel->user;

        $endereco = $servico->ong->endereco ?? $pessoa->endereco;

        $socioEconomicos = $pessoa->dadosSocioEconomicos ?? null;

        $ong = $servico->ong ?? null;


        $data = [$user, $pessoa, $endereco, $animal, $socioEconomicos, $clinica, $clinicaEndereco, $ong, $servico, $servico->atendimento, $raca];
        // dd($data[3]);

        activity()
            ->causedBy(Auth::user())
            ->performedOn($servico->atendimento)
            ->withProperties($data)
            ->log('impressao-guia-castracao');

        $codigo = $data[9]->codigo ?? '';

        $pdf = PDF::loadView('admin.servicos.guia-de-autorizacao.guia', compact('data'));

        return $pdf->download('guia-' . $codigo  . '-' . Str::slug($data[0]->name) . '.pdf');
    }
}
