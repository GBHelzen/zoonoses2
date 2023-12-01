<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">


        <!-- Imagem -->
        <div class="col-span-6 sm:col-span-6 ">
            <div class="mt-4">

                <x-label for="imagem" :value="__('Imagem')" class="inline-flex font-bold" /> <span
                    class="inline-flex ml-1 text-sm text-yellow-700 inline-flex">imagem a ser utilizada na carteirinha</span>
                    <span
                    class="inline-flex ml-1 text-sm text-red-900 inline-flex">formato PNG, JPG, JPEG</span>
                    <input wire:model="imagem" id="imagem" class="block mt-1 w-full" type="file"
                    name="imagem" :value="" >
                    @if ($imagem)
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <img src="{{ ($imagem->temporaryUrl()) }}" height="100" width="100">
                                {{-- {{$imagem}} --}}
                            </div>
                        </div>
                    @else
                    <img src="{{$animal->getFirstMediaUrl('animais')}}" height="100" width="100"/>
                    @error('imagem') <span class="text-red-700">{{ $message }}</span> @enderror
                    @endif
                </div>
                <div wire:loading wire:target="imagem" class="text-sm italic text-gray-500">carregando...</div>
        </div>

        <div class="grid grid-cols-12 gap-2">

            @can('isAdmin' | 'superAdmin')
                <!-- Número Chip -->
            <div class="col-span-12 sm:col-span-3 ">
                <div class="mt-4">

                    <x-label for="num_chip" :value="__('Número Chip')" class="inline-flex " />

                    <x-input wire:model="animal.num_chip" id="num_chip" class="block mt-1 w-full" type="text" name="num_chip"
                    :value="old('num_chip')"/>
                    @error('animal.num_chip') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>
            @else
                <!-- Número Chip -->
            <div class="col-span-12 sm:col-span-3 ">
                <div class="mt-4">

                    <x-label for="num_chip" :value="__('Número Chip')" class="inline-flex " />

                    <x-input wire:model="animal.num_chip" id="num_chip" class="block mt-1 w-full" type="text" name="num_chip"
                    :value="old('num_chip')" readonly/>
                    @error('animal.num_chip') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>
            @endcan

            <!-- Nome -->
            <div class="col-span-12 sm:col-span-3 ">
                <div class="mt-4">

                    <x-label for="nome" :value="__('Nome')" class="inline-flex " /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                    <x-input wire:model="animal.nome" id="nome" class="block mt-1 w-full" type="text" name="nome"
                        :value="old('nome')" />
                    @error('animal.nome') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- Espécie --}}
            <div class="col-span-12 sm:col-span-3">
                <div class="mt-4">

                    <x-label for="especie" :value="__('Espécie')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                    <select wire:model="animal.especie" id="especie" name="especie" autocomplete="especie"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selecione</option>
                        <option value="canina">Canina</option>
                        <option value=felina>Felina</option>
                    </select>

                    @error('animal.especie') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>
            {{-- Porte --}}
            <div class="col-span-12 sm:col-span-3">
                <div class="mt-4">

                    <x-label for="porte" :value="__('Porte')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                    <select wire:model="animal.porte" id="porte" name="porte" autocomplete="porte"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selecione</option>
                        <option value="mini">Mini</option>
                        <option value="pequeno">Pequeno</option>
                        <option value="medio">Médio</option>
                        <option value="grande">Grande</option>
                    </select>

                    @error('animal.porte') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Sexo --}}
            <div class="col-span-12 sm:col-span-3">
                <div class="mt-4">

                    <x-label for="sexo" :value="__('Sexo')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                    <select wire:model="animal.sexo" id="sexo" name="sexo" autocomplete="sexo"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selecione</option>
                        <option value="macho">Macho</option>
                        <option value="femea">Fêmea</option>
                    </select>

                    @error('animal.sexo') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Raça --}}
            <div class="col-span-12 sm:col-span-3">
                <div class="mt-4">

                    <x-label for="raca" :value="__('Raça')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                        <select wire:model="animal.raca" id="raca" name="raca" autocomplete="raca"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selecione</option>
                        @if($this->animal->especie == 'canina')
                            @foreach($racasC as $raca)
                                <option value="{{$raca->id}}">{{$raca->nome}}</option>
                            @endforeach
                        @else
                            @foreach($racasF as $raca)
                                <option value="{{$raca->id}}">{{$raca->nome}}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('animal.raca') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="col-span-12 sm:col-span-3">
                <!-- Idade -->
                <div class="mt-4">
                    <x-label for="idade" :value="__('Idade')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">* Em meses. Até 36
                        meses</span>

                    <x-input wire:model="animal.idade" id="idade" class="block mt-1 w-full" type="number" max="36"
                        name="idade" :value="old('idade')" />
                    @error('animal.idade') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-span-12 sm:col-span-3">
                <!-- Cor Pelagem -->
                <div class="mt-4">
                    <x-label for="cor_pelagem" :value="__('Cor Pelagem')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                    <x-input wire:model="animal.cor_pelagem" id="cor_pelagem" class="block mt-1 w-full" type="text"
                        name="cor_pelagem" :value="old('cor_pelagem')" />
                    @error('animal.cor_pelagem') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Temperamento --}}
            <div class="col-span-12 sm:col-span-3">
                <div class="mt-4">

                    <x-label for="temperamento" :value="__('Temperamento')" class="inline-flex" /> <span
                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                    <select wire:model="animal.temperamento" id="temperamento" name="temperamento"
                        autocomplete="temperamento"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selecione</option>
                        <option value="docil">Dócil</option>
                        <option value="bravo">Bravo</option>
                        <option value="calmo">Calmo</option>
                    </select>

                    @error('animal.temperamento') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>




            {{-- Vacinado Raiva --}}

            <fieldset class="col-span-12 sm:col-span-3">
                <div>
                    <x-label class="inline-flex" for="nome" :value="__('Vacinado contra raiva ?')" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                    <p class="text-sm text-gray-500">
                    </p>
                </div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                        <input wire:model="animal.vacinado_raiva" id="vacinado_raivaS"
                            name="vacinado_raiva" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Sim
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="animal.vacinado_raiva" id="vacinado_raivaN"
                            name="vacinado_raiva" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Não
                        </label>
                    </div>
                    @error('animal.vacinado_raiva') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            @if ( $this->animal != null && $this->animal->vacinado_raiva)
            <div class="col-span-12 sm:col-span-3">
                <!-- Data vacina raiva -->
                <div class="mt-4">
                    <x-label for="vacinado_raiva_data" :value="__('Data vacinação raiva')" class="inline-flex" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>

                    <x-input wire:model="animal.vacinado_raiva_data" id="vacinado_raiva_data" class="block mt-1 w-full"
                        type="date" name="vacinado_raiva_data" :value="old('vacinado_raiva_data')" />
                    @error('animal.vacinado_raiva_data') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endif


            {{-- Vacinado Polivalente --}}

            <fieldset class="col-span-12 sm:col-span-3">
                <div>
                    <x-label class="inline-flex" for="nome" :value="__('Vacinado polivalente ?')" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                    <p class="text-sm text-gray-500">
                    </p>
                </div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                        <input wire:model="animal.vacinado_polivalente" id="vacinado_polivalenteS"
                            name="vacinado_polivalente" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Sim
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="animal.vacinado_polivalente" id="vacinado_polivalenteN"
                            name="vacinado_polivalente" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Não
                        </label>
                    </div>
                    @error('animal.vacinado_polivalente') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>


            @if ($this->animal != null && $this->animal->vacinado_polivalente)
            <div class="col-span-12 sm:col-span-3">
                <!-- Data vacina polivalente -->
                <div class="mt-4">
                    <x-label for="vacinado_polivalente_data" :value="__('Data vacinação polivalente')"
                        class="inline-flex" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>

                    <x-input wire:model="animal.vacinado_polivalente_data" id="vacinado_polivalente_data"
                        class="block mt-1 w-full" type="date" name="vacinado_polivalente_data"
                        :value="old('vacinado_polivalente_data')" />
                    @error('animal.vacinado_polivalente_data') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            @endif




            {{-- Animal de Rua --}}

            <fieldset class="col-span-12 sm:col-span-3">
                <div>
                    <x-label class="inline-flex" for="nome" :value="__('Animal de rua ?')" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                    <p class="text-sm text-gray-500">
                    </p>
                </div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                        <input wire:model="animal.animal_rua" id="animal_ruaS" name="animal_rua"
                            type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                            value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Sim
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="animal.animal_rua" id="animal_ruaN" name="animal_rua"
                            type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                            value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Não
                        </label>
                    </div>
                    @error('animal.animal_rua') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            {{-- Animal de ONG --}}

            <fieldset class="col-span-12 sm:col-span-3">
                <div>
                    <x-label class="inline-flex" for="nome" :value="__('Animal de ONG ?')" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                    <p class="text-sm text-gray-500">
                    </p>
                </div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                        <input wire:model="animal.animal_ong" id="animal_ongS" name="animal_ong"
                            type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                            value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Sim
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="animal.animal_ong" id="animal_ongN" name="animal_ong"
                            type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                            value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Não
                        </label>
                    </div>
                    @error('animal.animal_ong') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>

            {{-- Animal castrado --}}

            <fieldset class="col-span-12 sm:col-span-3">
                <div>
                    <x-label class="inline-flex" for="nome" :value="__('Animal castrado ?')" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                    <p class="text-sm text-gray-500">
                    </p>
                </div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center">
                        <input wire:model="animal.animal_castrado" id="animal.animal_castradoS"
                            name="animal.animal_castrado" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Sim
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="animal.animal_castrado" id="animal.animal_castradoN"
                            name="animal.animal_castrado" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Não
                        </label>
                    </div>
                    @error('animal.animal_castrado') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>


            @if ($this->animal != null && $this->animal->animal_castrado)
            <div class="col-span-12 sm:col-span-3">
                <!-- Data castração animal -->
                <div class="mt-4">
                    <x-label for="animal_castrado_data" :value="__('Data da castração')"
                        class="inline-flex" />
                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>

                    <x-input wire:model="animal.animal_castrado_data" id="animal_castrado_data"
                        class="block mt-1 w-full" type="date" name="animal_castrado_data"
                        :value="old('animal_castrado_data')" />
                    @error('animal.animal_castrado_data') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            @endif





            <div class="col-span-12 sm:col-span-6 lg:col-span-6">
                <!-- Observação -->
                <div class="mt-4">
                    <x-label for="observacao" :value="__('Observação')" class="inline-flex" />

                    <textarea wire:model="animal.observacao" id="observacao" name="observacao" rows="3"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('observacao') }}</textarea>
                    @error('animal.observacao') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </div>


        </div>
    </div>

    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
        <a href="{{ route('ong.dashboard') }}" type="button"
            class="py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Voltar
        </a>
        <button wire:click.prevent="store()" type="button"
            class="py-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Salvar
        </button>
    </div>
</div>
