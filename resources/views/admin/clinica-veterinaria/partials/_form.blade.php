<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">



        <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-3 ">
                <!-- Nome -->
                <div class="mt-4">
                    <div class="inline-flex">

                        <x-label for="nome" :value="__('Nome')" /> <span class="ml-1 text-sm text-red-700">*</span>
                    </div>

                    <x-input wire:model="clinica.nome" id="nome" class="block mt-1 w-full" type="text" name="nome"
                        :value="old('nome')" />
                    @error('clinica.nome') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="col-span-6 sm:col-span-3">
                <!-- Telefone -->
                <div class="mt-4">
                    <div class="inline-flex">
                        <x-label for="telefone" :value="__('Telefone')" /> <span
                            class=" ml-1 text-sm text-red-700">*</span>
                    </div>

                    <x-input wire:model="clinica.telefone" id="telefone" class="block mt-1 w-full" type="text"
                        name="telefone" :value="old('telefone')" />
                    @error('clinica.telefone') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="py-2 col-span-6 sm:col-span-6 w-full">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Endereço
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Informe os dados de endereco da clínica
                    </p>
                </div>


            </div>

            <div class="col-span-6">
                @if (session()->has('error'))
                <div id="alert"
                    class="py-4 mb-4 close cursor-pointer flex items-center justify-between w-full p-2 bg-red-200 shadow rounded">
                    {{ session('error') }}
                    <svg onclick="document.getElementById('alert').remove();" class="fill-current"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
                @endif
            </div>



            <div class="col-span-6 sm:col-span-3 mt-4">
                <!-- cep -->

                <x-label for="cep" :value="__('CEP')" /><span
                class=" ml-1 text-sm text-red-700">*</span>

                <x-input wire:model="endereco.cep" id="cep" class="inline-flex items-center  mt-1 w-2/3" type="text" name="cep"
                    :value="old('cep')" />

                <button wire:click="buscaCep"
                    class="inline-flex items-center ml-1 bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-3 mt-1 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1"
                    type="button">
                    <svg class="flex-shrink-0 h-4 w-4 text-white" fill="currentColor" aria-hidden="true"
                        data-icon="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                        </path>
                    </svg>
                </button>
                @error('endereco.cep') <span class="text-red-700 block">{{ $message }}</span>@enderror
            </div>

            <div class="col-span-6 sm:col-span-3">
                <!-- endereco -->
                <div class="mt-4">
                    <x-label for="endereco" :value="__('Logradouro')" /><span
                    class=" ml-1 text-sm text-red-700">*</span>

                    <x-input wire:model="endereco.endereco" id="endereco" class="block mt-1 w-full" type="text"
                        name="endereco" :value="old('endereco')" />
                    @error('endereco.endereco') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-span-3 sm:col-span-3">
                <!-- numero -->
                <div class="mt-4">
                    <x-label for="numero" :value="__('Número')" /><span
                    class=" ml-1 text-sm text-red-700">*</span>

                    <x-input wire:model="endereco.numero" id="numero" class="block mt-1 w-full" type="text"
                        name="numero" :value="old('numero')" />
                    @error('endereco.numero') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <!-- bairro -->
                <div class="mt-4">
                    <x-label for="bairro" :value="__('Bairro')" /><span
                    class=" ml-1 text-sm text-red-700">*</span>

                    <x-input wire:model="endereco.bairro" id="bairro" class="block mt-1 w-full" type="text"
                        name="bairro" :value="old('bairro')" />
                    @error('endereco.bairro') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <!-- cidade -->
                <div class="mt-4">
                    <x-label for="cidade" :value="__('Cidade')" /><span
                    class=" ml-1 text-sm text-red-700">*</span>

                    <x-input wire:model="endereco.cidade" id="cidade" class="block mt-1 w-full" type="text"
                        name="cidade" :value="old('cidade')" />
                    @error('endereco.cidade') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <!-- Complemento -->
                <div class="mt-4">
                    <x-label for="complemento" :value="__('Complemento')" />

                    <x-input wire:model="endereco.complemento" id="complemento" class="block mt-1 w-full" type="text"
                        name="complemento" :value="old('complemento')" />
                    @error('endereco.complemento') <span class="text-red-700">{{ $message }}</span>
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
        <button wire:click="store()" type="submit"
            class="py-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
        </button>
    </div>
</div>
