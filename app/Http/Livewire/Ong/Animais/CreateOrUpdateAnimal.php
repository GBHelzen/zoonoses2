<?php

namespace App\Http\Livewire\Ong\Animais;

use App\Models\Animal;
use App\Models\Especie;
use App\Models\PessoaJuridica;
use App\Models\Raca;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateOrUpdateAnimal extends Component
{
    use WithFileUploads;
    public Animal $animal;
    public $imagem;
    // public PessoaJuridica $ong;


    public function mount(Animal $animal)
    {
        $this->animal = $animal;
        $this->especies = Especie::orderBy('nome')->get();
        $this->racasC = Raca::orderBy('nome')->where('especie_id', function($q){
            $q->select('id')->from('especies')->where('nome', 'Canina');
        })->get();
        $this->racasF = Raca::orderBy('nome')->where('especie_id', function($q){
            $q->select('id')->from('especies')->where('nome', 'Felina');
        })->get();
    }


    function rules()
    {
        return [
            'imagem.*' => ['image|nullable|mimes:jpg,jpeg,png|max:1024'],
            'animal.nome' => ['string', 'required'],
            'animal.especie' => ['string', 'required', 'in:canina,felina'],
            'animal.sexo' => ['string', 'required', 'in:macho,femea'],
            'animal.idade' => ['numeric', 'required', 'max:36'],
            'animal.raca' => ['string', 'required',],
            'animal.porte' => ['string', 'required',],
            'animal.cor_pelagem' => ['string', 'required',],
            'animal.temperamento' => ['string', 'required', 'in:docil,bravo,calmo'],
            'animal.num_chip' => ['string', 'nullable'],

            'animal.animal_castrado' => ['boolean', 'required',],
            'animal.animal_castrado_data' => $this->animal->animal_castrado == 1 ? ['required', 'date', 'before_or_equal:' .  now()->format('Y-m-d')] : 'nullable',

            'animal.vacinado_raiva' => ['boolean', 'required',],
            'animal.vacinado_raiva_data' => $this->animal->vacinado_raiva == 1 ? ['required', 'date', 'before_or_equal:' .  now()->format('Y-m-d')] : 'nullable',

            'animal.vacinado_polivalente' => ['boolean', 'required',],
            'animal.vacinado_polivalente_data' => $this->animal->vacinado_polivalente == 1 ? ['required', 'date', 'before_or_equal:' .  now()->format('Y-m-d')] : 'nullable',

            'animal.animal_rua' => ['boolean', 'required',],
            'animal.animal_ong' => ['boolean', 'required',],
            'animal.observacao' => ['string', 'nullable',],

        ];
    }

    public function messages()
    {
        return [
            'animal.animal_castrado_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'animal.vacinado_raiva_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'animal.vacinado_polivalente_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
        ];
    }

    public function store()
    {
        $this->validate();

        if(!$this->animal->vacinado_raiva){
            $this->animal->vacinado_raiva_data = null;
        }

        if(!$this->animal->vacinado_polivalente){
            $this->animal->vacinado_polivalente_data = null;
        }

        if(!$this->animal->animal_castrado){
            $this->animal->animal_castrado_data = null;
        }

        if($this->imagem != null){
            if($this->animal->getMedia('animais') != null){
                $this->animal->clearMediaCollection('animais');
            }
            $this->animal->addMedia($this->imagem)->toMediaCollection('animais');
        }

        $this->animal->ong()->associate(Auth::user()->pessoa->ong->id);
        $this->animal->save();


        session()->flash('success', 'Dados do animal salvo com sucesso !');

        return redirect()->to('/ong/dashboard');

        // redirect()->route('ong.dashboard');

    }


    public function render()
    {
        return view('ong.animais.create-or-update-animal')->layout('layouts.ong');
    }
}
