<div>
    {{-- Success is as dangerous as failure. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Informações do animal') }} <strong> {{$this->animal->nome}}</strong>
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        @include('_flash-messages')


        <div class="md:grid md:grid-cols-3 md:gap-4">

            <div class="mt-5 md:mt-0 md:col-span-3">
                <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                    @include('admin.animais.partials._form')
                </form>
            </div>
        </div>

    </div>

</div>
