<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use App\Rules\CheckStatusServicoAtendimento;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {

        // dd("aqui");
        // $users = User::all();

        // foreach($users as $user){
        //     // dd("AQUI");
        //     if(!$user->pessoa){
        //         $user->password = Hash::make($user->password);
        //         $user->save();
        //         $user->pessoa()->create($user->only(['email']));
        //     }
        // }

        return view(
            'admin.pessoas.index',
            [
                'users'  =>
                User::where('name', 'ilike', '%' . $this->search .  '%')
                ->orWhere('cpf', 'ilike', '%' . $this->search . '%')->orderBy('name')->paginate(10),
            ]
        );
    }

}
