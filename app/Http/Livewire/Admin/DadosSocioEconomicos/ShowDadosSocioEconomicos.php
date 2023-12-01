<?php

namespace App\Http\Livewire\Admin\DadosSocioEconomicos;

use App\Models\DadosSocioEconomico;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowDadosSocioEconomicos extends Component
{
    public Pessoa $pessoa;

    public DadosSocioEconomico $dadosSocioEconomicos;

    public $renda_familiar;
    public $pessoas_em_domicilio;
    public $participa_programa_social;
    public $programas_sociais = [];

    public $quantidade_cachorro_macho;
    public $quantidade_cachorro_femea;
    public $quantidade_cachorro_total;

    public $quantidade_gato_total;
    public $quantidade_gato_macho;
    public $quantidade_gato_femea;

    function rules()
    {

        return [
            'renda_familiar' => ['min:1', 'required'],
            'pessoas_em_domicilio' => ['numeric', 'min:1', 'required'],
            'participa_programa_social' => ['boolean', 'required'],

            'programas_sociais' => $this->dadosSocioEconomicos->participa_programa_social ? 'required' : 'nullable',

            'quantidade_cachorro_macho' => ['numeric', 'required'],
            'quantidade_cachorro_femea' => ['numeric', 'required'],

            'quantidade_gato_macho' => ['numeric', 'required'],
            'quantidade_gato_femea' => ['numeric', 'required'],
        ];
    }

    public function mount(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
        // dd($pessoa, $pessoa->user);
        $this->dadosSocioEconomicos = $pessoa->dadosSocioEconomicos ?? new DadosSocioEconomico();

        if ( $this->dadosSocioEconomicos) {
            $this->renda_familiar =  $this->dadosSocioEconomicos->renda_familiar;
            $this->pessoas_em_domicilio =  $this->dadosSocioEconomicos->pessoas_em_domicilio;

            $this->participa_programa_social =  $this->dadosSocioEconomicos->participa_programa_social;
            $this->programas_sociais =  $this->dadosSocioEconomicos->programas_sociais;

            $this->quantidade_cachorro_macho =  $this->dadosSocioEconomicos->quantidade_cachorro_macho;
            $this->quantidade_cachorro_femea =  $this->dadosSocioEconomicos->quantidade_cachorro_femea;
            $this->quantidade_cachorro_total =  $this->dadosSocioEconomicos->quantidade_cachorro_total;

            $this->quantidade_gato_total =  $this->dadosSocioEconomicos->quantidade_gato_total;
            $this->quantidade_gato_macho =  $this->dadosSocioEconomicos->quantidade_gato_macho;
            $this->quantidade_gato_femea =  $this->dadosSocioEconomicos->quantidade_gato_femea;
        }
    }


    public function store()
    {
        // dd("xablau");
        $this->validate();

        DB::transaction(function () {
            $this->pessoa->dadosSocioEconomicos()->updateOrCreate(
                [
                    'pessoa_id' => $this->pessoa->id,
                ],
                [
                    'renda_familiar' => str_replace(',', '.', str_replace('.', '', $this->renda_familiar)),
                    'pessoas_em_domicilio' => $this->pessoas_em_domicilio,
                    'participa_programa_social' => $this->participa_programa_social,
                    'programas_sociais' => $this->programas_sociais,
                    'quantidade_cachorro_macho' => $this->quantidade_cachorro_macho,
                    'quantidade_cachorro_femea' => $this->quantidade_cachorro_femea,
                    'quantidade_cachorro_total' => $this->quantidade_cachorro_macho + $this->quantidade_cachorro_femea,
                    'quantidade_gato_macho' => $this->quantidade_gato_macho,
                    'quantidade_gato_femea' => $this->quantidade_gato_femea,
                    'quantidade_gato_total' => $this->quantidade_gato_macho + $this->quantidade_gato_femea,
                ]
            );
        });

        session()->flash('success', 'Dados SocioEconomicos da pessoa ' . $this->pessoa->user->name . ' foram atualizados com sucesso !');

        // return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('admin.dados-socio-economicos.show-dados-socio-economicos')->layout('layouts.admin');
    }
}
