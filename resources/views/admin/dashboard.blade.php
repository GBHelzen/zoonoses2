<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>





    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @livewire('admin.servicos.show-servicos')


        </div>
    </div>
</x-admin-layout>