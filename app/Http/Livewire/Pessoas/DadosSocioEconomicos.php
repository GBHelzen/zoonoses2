<?php

namespace App\Http\Livewire\Pessoas;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DadosSocioEconomicos extends Component
{
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


    public function mount()
    {
        $dadosSocioEconomicos = Auth::user()->pessoa->dadosSocioEconomicos;

        if ($dadosSocioEconomicos) {
            $this->renda_familiar = $dadosSocioEconomicos->renda_familiar;
            $this->pessoas_em_domicilio = $dadosSocioEconomicos->pessoas_em_domicilio;

            $this->participa_programa_social = $dadosSocioEconomicos->participa_programa_social;
            $this->programas_sociais = $dadosSocioEconomicos->programas_sociais;

            $this->quantidade_cachorro_macho = $dadosSocioEconomicos->quantidade_cachorro_macho;
            $this->quantidade_cachorro_femea = $dadosSocioEconomicos->quantidade_cachorro_femea;
            $this->quantidade_cachorro_total = $dadosSocioEconomicos->quantidade_cachorro_total;

            $this->quantidade_gato_total = $dadosSocioEconomicos->quantidade_gato_total;
            $this->quantidade_gato_macho = $dadosSocioEconomicos->quantidade_gato_macho;
            $this->quantidade_gato_femea = $dadosSocioEconomicos->quantidade_gato_femea;
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    function rules()
    {

        return [
            'renda_familiar' => ['min:3', 'required'],
            'pessoas_em_domicilio' => ['numeric', 'min:1', 'required'],
            'participa_programa_social' => ['boolean', 'required'],

            'programas_sociais' => $this->participa_programa_social ? 'required' : 'nullable',

            // 'quantidade_cachorro_total' => ['numeric','min:1', 'required'],
            'quantidade_cachorro_macho' => ['numeric', 'required'],
            'quantidade_cachorro_femea' => ['numeric', 'required'],
            // 'quantidade_gato_total' => ['numeric', 'required'],
            'quantidade_gato_macho' => ['numeric', 'required'],
            'quantidade_gato_femea' => ['numeric', 'required'],
        ];
    }

    public function store()
    {
        $this->validate();

        $user = Auth::user();

        $user->pessoa->dadosSocioEconomicos()->updateOrCreate(
            [

                'pessoa_id' => $user->pessoa->id,
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



        session()->flash('success', 'Dados socioeconômicos atualizados com sucesso !');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('pessoas.dados-socio-economicos');
    }
}
