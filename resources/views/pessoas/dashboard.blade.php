<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Início') }}
        </h2>
    </x-slot>

    {{-- @include('layouts.notificacao') --}}


{{-- {{dd(session('impersonated_by'))}} --}}
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('pessoas.animal.show-animais')
        </div>
    </div>

    <div class="pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('pessoas.servicos.show-servicos')
        </div>
    </div>
</x-app-layout>
