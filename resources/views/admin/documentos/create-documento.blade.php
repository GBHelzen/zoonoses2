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
                {{-- <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                    @include('admin.documentos.partials._form')
                </form> --}}
                {{-- <form wire:submit.prevent="save" method="POST" enctype="multipart/form-data">
                    @include('admin.documentos.partials._form')
                </form> --}}
                    <input type="file" wire:model="arquivo">
                 
                    @error('arquivo') <span class="error">{{ $message }}</span> @enderror

                    <input type="text" wire:model="nome_arquivo">
                 
                    @error('nome_arquivo') <span class="error">{{ $message }}</span> @enderror
                 
                    <button type="submit" wire:click='save'>Save Doc</button>
                {{-- <form action="{{ route('documentos.save') }}" method="POST">
                    @csrf
                    <input type="file" name="arquivo">
                    <input type="text" name="nome_arquivo" placeholder="Escreva o titulo do documento">
                    <button type="submit" >Save Doc</button>
                </form> --}}
        </div>

    </div>
</div>