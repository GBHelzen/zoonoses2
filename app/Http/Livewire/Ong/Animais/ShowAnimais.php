<?php

namespace App\Http\Livewire\Ong\Animais;

use App\Models\Animal;
use App\Models\CategoriaServico;
use App\Models\Servico;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowAnimais extends Component
{

    public Animal $animal;

    public $destroyAnimal = 0;

    public function openDestroyModal()
    {
        $this->destroyAnimal = true;
    }

    public function closeDestroyModal()
    {
        $this->destroyAnimal = false;

        $this->newAnimal();
    }

    public function destroy(Animal $animal)
    {
        $this->animal = $animal;

        $this->openDestroyModal();
    }

    public function deleteAnimal()
    {
        $this->animal->delete();

        session()->flash('success', 'Animal ' . $this->animal->nome . ' deletado com sucesso !');

        $this->newAnimal();

        $this->closeDestroyModal();
    }

    public function newAnimal()
    {
        $this->animal = new Animal();
    }

    public function solicitarCastracao(Animal $animal)
    {
        // valida dados do perfil
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
            'pessoa_juridica_id' => Auth::user()->pessoa->ong->id,
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
            'ong.animais.show-animais',
            [
                'animais' => Auth::user()->pessoa->ong->animais
            ]
        );
    }
}
