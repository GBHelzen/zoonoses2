<div>
    {{-- Do your work, then step back. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Informações do cidadão') }} <strong> {{$this->pessoa->user->name}}</strong>
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        <x-flash-messages></x-flash-messages>

        <div class="md:grid md:grid-cols-3 md:gap-4">

            <div class="mt-5 md:mt-0 md:col-span-3">
                <form wire:submit.prevent="store" method="POST">
                    @include('admin.pessoas.partials._form')
                </form>
            </div>

        </div>

        @if (!$this->pessoa->ong()->exists())
        @livewire('admin.dados-socio-economicos.show-dados-socio-economicos', ['pessoa' => $this->pessoa])
        @endif


        @livewire('admin.pessoas.servicos', ['pessoa' => $this->pessoa])


        @livewire('admin.pessoas.animais', ['pessoa' => $this->pessoa])
    </div>


</div>