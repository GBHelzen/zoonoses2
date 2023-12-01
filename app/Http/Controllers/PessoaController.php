<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Pessoa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\CPF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PessoaController extends Controller
{

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->orderBy('name', 'desc')->paginate(10);
        return view('admin.pessoas.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'max:255', new CPF(), 'unique:users'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        DB::transaction(function () use ($request) {

            Auth::login($user = User::create([
                'name' => $request->name,
                'cpf' => $request->cpf,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]));

            $user->pessoa()->create($request->only(['email']));

        });


        // event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pessoas.perfil', compact('user'));
    }

    /**
    * Adiconar a papeis
    */
    public function addRoles($id)
    {
        $user = User::findOrFail($id);
        $papeis = Role::whereNotIn('name', $user->getRoleNames())->get();
        return view('admin.pessoas.add-roles', compact('user', 'papeis'));
    }

    /**
    * logando com outros usuários
    */
    public function impersonate($id)
    {
        $user = User::findOrFail($id);
        Auth::user()->impersonate($user);
        if($user->pessoa->ong != null){
            return redirect()->route('ong.dashboard');
        }else{
            return redirect()->route('dashboard');
        }
    }

    /**
    * logando com outros usuários
    */
    public function impersonateLeave()
    {
        Auth::user()->leaveImpersonation();
        return redirect('/admin/pessoas');
    }

    /**
    * Alterar a senha
    */
    public function editPassword($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pessoas.edit', compact('user'));
    }



  public function updatePassword(Request $request, $id)
  {
    $user = User::findOrFail($id);

    if($request->tipo_usuario){
        $user->syncRoles($request->tipo_usuario);
        session()->flash('success', 'Usuário atualizado com sucesso!');
        return redirect('/admin/pessoas');
    }

    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|confirmed|min:8',
    ]);

    if($user->email == $request->email){
        $user->password = Hash::make($request->password);

        if($user->save()){
            session()->flash('success', 'Usuário atualizado com sucesso!');
            return redirect('/admin/pessoas');
        }else{
            session()->flash('error', 'Não foi possível atualizar a senha do usuário!');
            return back();
        }
    }else{
            session()->flash('error', 'Não foi possível atualizar a senha do usuário, verifique o e-mail e a senha informados!');
            return back();
    }
  }

}
