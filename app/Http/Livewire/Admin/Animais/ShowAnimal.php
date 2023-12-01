<?php

namespace App\Http\Livewire\Admin\Animais;

use App\Models\Animal;
use App\Models\Contato;
use App\Models\Especie;
use App\Models\Raca;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowAnimal extends Component
{
    use WithFileUploads;
    public Animal $animal;
    public $imagem, $especies;

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
            // 'imagem.*' => ['image', 'nullable', 'mimes:jpg,jpeg', 'png|max:5120'],
            'animal.nome' => ['string', 'required'],
            // 'animal.num_identificacao' => ['string', 'required'],
            'animal.num_chip' => ['nullable', ''],
            'animal.especie' => ['string', 'required', 'in:canina,felina'],
            'animal.sexo' => ['string', 'required', 'in:macho,femea'],
            'animal.idade' => ['numeric', 'required', 'max:36'],
            'animal.raca' => ['string', 'required',],
            'animal.porte' => ['string', 'required',],
            'animal.cor_pelagem' => ['string', 'required',],
            'animal.temperamento' => ['string', 'required', 'in:docil,bravo,calmo'],

            'animal.animal_castrado' => ['boolean', 'required'],
            'animal.animal_castrado_data' => $this->animal->animal_castrado == 1 ? ['date', 'required'] : 'nullable',

            'animal.vacinado_raiva' => ['boolean', 'required',],
            'animal.vacinado_raiva_data' => $this->animal->vacinado_raiva == 1 ? ['date', 'required'] : 'nullable',

            'animal.vacinado_polivalente' => ['boolean', 'required',],
            'animal.vacinado_polivalente_data' => $this->animal->vacinado_polivalente == 1 ? 'date|required' : 'nullable',

            'animal.animal_rua' => ['boolean', 'required',],
            'animal.animal_ong' => ['boolean', 'required',],
            'animal.observacao' => ['string', 'nullable',],

        ];
    }

    function messages()
    {
        return [
            'animal.nome.required' => 'Informe o nome do animal',
            'animal.especie.required' => 'Informe a espécie do animal',
            'animal.idade.required' => 'Informe a idade do animal',
            // 'imagem.max' => 'O tamanho da não pode ultrapassar 5 megas',
            // 'imagem.mimes' => 'Imagens permitidas: jpg, jpeg e png',
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


        $this->animal->save();

        if($this->imagem != null){
            if($this->animal->getMedia('animais') != null){
                $this->animal->clearMediaCollection('animais');
            }

            $this->animal->addMedia($this->imagem)->toMediaCollection('animais');
        }

        session()->flash('success', 'Dados do animal ' . $this->animal->nome . ' foram atualizados com sucesso !');

        return redirect()->to('/admin/dashboard');
    }

    public function render()
    {
        return view('admin.animais.show-animal')->layout('layouts.admin');
    }
}
