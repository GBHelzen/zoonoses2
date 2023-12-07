    {{-- Nothing in the world is as soft and yielding as water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Documento ') }} {{$documento->nome_arquivo}}
        </h2>
    </x-slot>


    <div class="mt-10 sm:mt-0">
        @include('_flash-messages')


        <div class="md:grid md:grid-cols-3 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-3">
                {{-- <form wire:submit.prevent="save" method="POST">
                    @include('admin.documentos.partials._form')
                </form> --}}
                <div class="mt-5 md:mt-0 md:col-span-3">
                    <input type="file" wire:model="arquivo" accept="application/pdf">
                     
                    @error('arquivo') <span class="error">{{ $message }}</span> @enderror
    
                    <input type="text" wire:model="nome_arquivo">
                     
                    @error('nome_arquivo') <span class="error">{{ $message }}</span> @enderror
                     
                    <button type="submit" wire:click='save'>Save Doc</button>
                </div>
            </div>
        </div>

    </div>