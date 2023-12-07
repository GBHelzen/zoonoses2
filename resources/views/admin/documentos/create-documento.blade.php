    {{-- The Master doesn't talk, he acts. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Documento') }}
        </h2>
    </x-slot>


    <div class="mt-10 sm:mt-0">
        @include('_flash-messages')


        <div class="md:grid md:grid-cols-3 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-3">
                <form wire:submit.prevent="save" method="POST">
                    @include('admin.documentos.partials._form')
                </form>
            </div>

        </div>
    </div>