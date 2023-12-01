<div>
    {{-- The Master doesn't talk, he acts. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Informações da ONG') }} <strong> {{$this->ong->razao_social}}</strong>
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        <x-flash-messages></x-flash-messages>

        <div class="md:grid md:grid-cols-3 md:gap-4">

            <div class="mt-5 md:mt-0 md:col-span-3">
                <form wire:submit.prevent="store" method="POST">
                    @include('admin.ong.partials._form')
                </form>
            </div>

        </div>

        @livewire('admin.ong.servicos', ['ong' => $this->ong])


        @livewire('admin.ong.animais', ['ong' => $this->ong])


    </div>
</div>