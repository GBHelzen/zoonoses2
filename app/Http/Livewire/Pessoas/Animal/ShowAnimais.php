<?php

namespace App\Http\Livewire\Pessoas\Animal;

use App\Models\Animal;
use App\Models\CategoriaServico;
use App\Models\Especie;
use App\Models\Raca;
use App\Models\Servico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowAnimais extends Component
{
    use WithFileUploads;
    public $modalOpen = 0;
    public $destroyAnimal = 0;
    public $edit = false;


    public $nome, $sexo, $idade, $especie, $raca, $cor_pelagem, $temperamento, $num_identificacao, $num_chip, $imagem;
    public $vacinado_raiva, $vacinado_raiva_data, $vacinado_polivalente, $vacinado_polivalente_data, $animal_castrado, $animal_castrado_data;
    public $animal_rua, $animal_ong, $observacao;


    public Animal $animal;



    function rules()
    {
        return [
            'animal.nome' => ['string', 'required'],
            'imagem.*' => ['image|nullable|mimes:jpg,jpeg,png|max:1024'],
            'animal.especie' => ['string', 'required', 'in:canina,felina'],
            'animal.sexo' => ['string', 'required', 'in:macho,femea'],
            'animal.idade' => ['numeric', 'required', 'max:36'],
            'animal.raca' => ['string', 'required'],
            'animal.porte' => ['string', 'required',],
            'animal.cor_pelagem' => ['string', 'required',],
            'animal.temperamento' => ['string', 'required', 'in:docil,bravo,calmo'],
            'animal.num_chip' => ['string', 'nullable'],

            'animal.animal_castrado' => ['boolean', 'required',],
            'animal.animal_castrado_data' => $this->animal->animal_castrado == 1 ? ['required', 'date', 'before_or_equal:' .  now()->format('Y-m-d')] : 'nullable',

            'animal.vacinado_raiva' => ['boolean', 'required',],
            'animal.vacinado_raiva_data' => $this->animal->vacinado_raiva == 1 ? ['date', 'required'] : 'nullable',

            'animal.vacinado_polivalente' => ['boolean', 'required',],
            'animal.vacinado_polivalente_data' => $this->animal->vacinado_polivalente == 1 ? ['date', 'required'] : 'nullable',

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
            'imagem.max' => 'O tamanho da não pode ultrapassar 5 megas',
            'imagem.mimes' => 'Imagens permitidas: jpg, jpeg e png',
            'animal.animal_castrado_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'animal.vacinado_raiva_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'animal.vacinado_polivalente_data.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
        ];
    }


    public function openDestroyModal()
    {
        $this->destroyAnimal = true;
    }

    public function closeDestroyModal()
    {
        $this->destroyAnimal = false;

        $this->newAnimal();
    }

    public function openModal()
    {
        // valida dados do perfil
        // retorna um flash com botao
        if (!Auth::user()->pessoa->perfilCompleto()) {
            session()->flash('error-animal', "Você deve preencher os seus dados pessoais para cadastrar um animal!");
            return;
        }

        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;

        $this->newAnimal();
    }

    public function mount()
    {
        $this->newAnimal();
        $this->especies = Especie::orderBy('nome')->get();
        $this->racasC = Raca::orderBy('nome')->where('especie_id', function($q){
            $q->select('id')->from('especies')->where('nome', 'Canina');
        })->get();
        $this->racasF = Raca::orderBy('nome')->where('especie_id', function($q){
            $q->select('id')->from('especies')->where('nome', 'Felina');
        })->get();
    }

    public function newAnimal()
    {
        $this->animal = new Animal();
    }

    public function edit(Animal $animal)
    {
        $this->animal = $animal;

        $this->edit = true;

        $this->openModal();
    }

    public function destroy(Animal $animal)
    {
        $this->animal = $animal;

        $this->openDestroyModal();
    }

    public function deleteAnimal()
    {
        // dd($this->animal);
        $this->animal->delete();

        session()->flash('success', 'Animal ' . $this->animal->nome . ' deletado com sucesso !');

        $this->newAnimal();

        $this->closeDestroyModal();
    }

    public function store($pessoa_id = null)
    {
        // se for edição a persistencia pode ocorrer
        if (!$this->edit) {
            if (Auth::user()->pessoa->naoEletivo() and Auth::user()->pessoa->animais()->count() >= 2) {

                $this->closeModal();

                return session()->flash('error', 'Você só pode possuir 2 animais cadastrados !');

                return;
            }else{
                if(Auth::user()->pessoa->animais()->count() >= 4){
                    $this->closeModal();

                    return session()->flash('error', 'Você só pode possuir 4 animais cadastrados !');

                    return;
                }
            }
        }


        $this->validate();

        $this->animal->pessoa_id = Auth::user()->pessoa->id;

        if($pessoa_id){
            $this->animal->pessoa_id = $pessoa_id;
        }

        if(!$this->animal->animal_castrado){
            $this->animal->animal_castrado_data = null;
        }

        if(!$this->animal->vacinado_raiva){
            $this->animal->vacinado_raiva_data = null;
        }

        if(!$this->animal->vacinado_polivalente){
            $this->animal->vacinado_polivalente_data = null;
        }

        $this->animal->save();

        if($this->imagem != null){
            if($this->animal->getMedia('animais') != null){
                $this->animal->clearMediaCollection('animais');
            }
            $this->animal->addMedia($this->imagem)->toMediaCollection('animais');
        }

        session()->flash('success', 'Dados do animal ' . $this->animal->nome . ' foram atualizados com sucesso !');
        $this->closeModal();
        return redirect(request()->header('Referer'));

    }

    public function solicitarCastracao(Animal $animal)
    {
        // valida dados do perfil
        // retorna um flash com botao
        if (!Auth::user()->pessoa->perfilCompleto()) {
            session()->flash('error-animal', "Você deve preencher os seus dados pessoais para que possamos avaliar sua solicitação !");
            return;
        }

        // verficar se o animal ja possui solicitação
        if ($animal->servico_em_aberto) {
            session()->flash('error', "O animal {$animal->nome} já possui uma solicitação de serviço !");
            return;
        }


        $categoria = CategoriaServico::where('slug', CategoriaServico::CASTRACAO)->first();

        Servico::create([
            'pessoa_id' => Auth::user()->pessoa->id,
            'animal_id' => $animal->id,
            'data_solicitacao' => \Carbon\Carbon::now(),
            'categoria_id' => $categoria->id,
            'status' =>  Servico::AGUARDANDO
        ]);


        session()->flash('success', 'O serviço foi solicitado com sucesso !');

        $this->emit('servicoStored');
    }



    public function render()
    {

        return view(
            'pessoas.animal.show-animais',
            [
                'animais' => Auth::user()->pessoa->animais
            ]
        );
    }
}
