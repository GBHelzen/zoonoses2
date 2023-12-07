<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">



        <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-3 ">
                <!-- Nome -->
                <div class="mt-4">
                    <div class="inline-flex">

                        <x-label for="nome_arquivo" :value="__('Título do Documento')" /> <span class="ml-1 text-sm text-red-700">*</span>
                    </div>
                    
                    <x-input wire:model="nome_arquivo" id="nome_arquivo" class="block mt-1 w-full" type="text" name="nome"
                        :value="old('nome_arquivo')" />
                    @error('nome_arquivo') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>

            <br>

            <div class="col-span-6 sm:col-span-3">
                <!-- Arquivo -->
                <div class="mt-4">
                    <div class="inline-flex">
                        <x-label for="arquivo" :value="__('Arquivo')" /> <span
                            class=" ml-1 text-sm text-red-700">*</span>
                    </div>
                    <br>

                    <x-input wire:model="arquivo" id="arquivo" class="input-file" type="file" accept="application/pdf"
                        name="arquivo" :value="old('arquivo')" />
                    @error('arquivo') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
        <a href="{{ url()->previous() }}" type="button"
            class="py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Voltar
        </a>
        <button type="submit"
            class="py-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
        </button>
    </div>
</div>
