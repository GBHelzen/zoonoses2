<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\CPF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

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

            // $pessoa->endereco()->create();

        });


        // event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
