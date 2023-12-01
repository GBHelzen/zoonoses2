<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">



        <div class="grid grid-cols-6 gap-3">

            {{-- Espécie --}}
            <div class="col-span-1 my-3 ">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700 inline-flex">Espécie</label><span class="inline-flex ml-1 text-sm text-red-700 ">*</span>
                <select wire:model="raca.especie_id" id="raca.especie_id" name="raca.especie_id"
                    autocomplete="raca.especie_id"
                    class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm text-sm">
                    <option value="">Selecione</option>
                    @foreach($especies as $especie)
                    <option value="{{$especie->id}}">{{$especie->nome}}</option>
                    @endforeach
                </select>
                @error('raca.especie_id') <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="col-span-6 sm:col-span-3 ">
            <!-- Raça -->
            <div class="mt-4">
                <div class="inline-flex">

                    <x-label for="raca.nome" :value="__('Raça')" /> <span class="ml-1 text-sm text-red-700">*</span>
                </div>

                <x-input wire:model="raca.nome" id="raca.nome" class="block mt-1 w-5/12" type="text" name="raca.nome"
                    :value="old('raca.nome')" />
                @error('raca.nome') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
        <a href="{{ route('racas.index') }}" type="button"
            class="py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Voltar
        </a>
        <button wire:click="store()" type="submit"
            class="py-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
        </button>
    </div>
</div>
