<div class="w-full fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



        <div class="fixed inset-0 transition-opacity">

            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

        </div>



        <!-- This element is to trick the browser into centering the modal contents. -->

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <div class="mt-5 text-center  sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Dados do animal <strong> {{ $this->animal->nome }} </strong>
                </h3>

            </div>
            <form enctype="multipart/form-data" method="post">

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="">

                        <div class="grid grid-cols-6 gap-6">
                                    {{-- {{ dd($animal->getFirstMedia('animais')) }} --}}
                            <!-- Imagem -->
                            <div class="col-span-6 sm:col-span-6 ">
                                <div class="mt-4">

                                    <x-label for="imagem" :value="__('Imagem')" class="inline-flex " /> <span
                                        class="inline-flex ml-1 text-sm text-yellow-700 inline-flex">imagem a ser utilizada na carteirinha</span>
                                        <span
                                        class="inline-flex ml-1 text-sm text-red-900 inline-flex">formato PNG, JPG, JPEG</span>
                                        <input wire:model="imagem" id="imagem" class="block mt-1 w-full" type="file"
                                        name="imagem" :value="" >
                                        @if ($imagem)
                                            <div class="space-y-1 text-center">
                                                <div class="flex text-sm text-gray-600">
                                                    <img src="{{ $imagem->temporaryUrl() }}" height="100" width="100">
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

                            {{-- @can('isAdmin' | 'superAdmin')
                            <!-- Número Chip -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="num_chip" :value="__('Número Chip')" class="inline-flex " />

                                    <x-input wire:model="animal.num_chip" id="num_chip" class="block mt-1 w-full" type="text" name="num_chip"
                                    :value="old('num_chip')"/>
                                    @error('animal.num_chip') <span class="text-red-700">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @else --}}
                                <!-- Número Chip -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="num_chip" :value="__('Número Chip')" class="inline-flex " />

                                    <x-input wire:model="animal.num_chip" id="num_chip" class="block mt-1 w-full" type="text" name="num_chip"
                                    :value="old('num_chip')"/>
                                    @error('animal.num_chip') <span class="text-red-700">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            {{-- @endcan --}}

                            <!-- Nome -->
                            <div class="col-span-6 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="nome" :value="__('Nome')" class="inline-flex " /> <span
                                        class="inline-flex ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input wire:model="animal.nome" id="nome" class="block mt-1 w-full" type="text"
                                        name="nome" :value="old('nome')" />
                                    @error('animal.nome') <span class="text-red-700">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            {{-- Espécie --}}
                            <div class="col-span-6 sm:col-span-3">
                                <div class="mt-4">

                                    <x-label for="especie" :value="__('Espécie')" class="inline-flex" /> <span
                                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <select wire:model="animal.especie" id="especie" name="especie"
                                        autocomplete="especie"
                                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Selecione</option>
                                        <option value="canina">Canina</option>
                                        <option value=felina>Felina</option>
                                    </select>

                                    @error('animal.especie') <span class="text-red-700">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            {{-- Porte --}}
                            <div class="col-span-6 sm:col-span-3">
                                <div class="mt-4">

                                    <x-label for="porte" :value="__('Porte')" class="inline-flex" /> <span
                                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <select wire:model="animal.porte" id="porte" name="porte"
                                        autocomplete="porte"
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
                            <div class="col-span-6 sm:col-span-3">
                                <div class="mt-4">

                                    <x-label for="sexo" :value="__('Sexo')" class="inline-flex" /> <span
                                        class="inline-flex ml-1 text-sm text-red-700 inline-flex">*</span>
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
                            <div class="col-span-6 sm:col-span-3">
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


                            <div class="col-span-3 sm:col-span-3">
                                <!-- Idade -->
                                <div class="mt-4">
                                    <x-label for="idade" :value="__('Idade')" class="inline-flex" /> <span
                                        class=" ml-1 text-sm text-red-700 inline-flex">* Em meses. Até 36
                                        meses</span>

                                    <x-input wire:model="animal.idade" id="idade" class="block mt-1 w-full"
                                        type="number" max="36" name="idade" :value="old('idade')" />
                                    @error('animal.idade') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <!-- Cor Pelagem -->
                                <div class="mt-4">
                                    <x-label for="cor_pelagem" :value="__('Cor Pelagem')" class="inline-flex" /> <span
                                        class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input wire:model="animal.cor_pelagem" id="cor_pelagem" class="block mt-1 w-full"
                                        type="text" name="cor_pelagem" :value="old('cor_pelagem')" />
                                    @error('animal.cor_pelagem') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Temperamento --}}
                            <div class="col-span-6 sm:col-span-3">
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

                            <fieldset class="col-span-6 sm:col-span-3">
                                <div>
                                    <x-label class="inline-flex" for="nome" :value="__('Vacinado contra raiva ?')" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <p class="text-sm text-gray-500">
                                    </p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input wire:model="animal.vacinado_raiva" id="animal.vacinado_raivaS"
                                            name="animal.vacinado_raiva" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="animal.vacinado_raiva" id="animal.vacinado_raivaN"
                                            name="animal.vacinado_raiva" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
                                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                            Não
                                        </label>
                                    </div>
                                    @error('animal.vacinado_raiva') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>

                            @if ( $this->animal != null && $this->animal->vacinado_raiva)
                            <div class="col-span-6 sm:col-span-3">
                                <!-- Data vacina raiva -->
                                <div class="mt-4">
                                    <x-label for="vacinado_raiva_data" :value="__('Data vacinação raiva')"
                                        class="inline-flex" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input wire:model="animal.vacinado_raiva_data" id="vacinado_raiva_data"
                                        class="block mt-1 w-full" type="date" name="vacinado_raiva_data"
                                        :value="old('vacinado_raiva_data')" />
                                    @error('animal.vacinado_raiva_data') <span
                                        class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif


                            {{-- Vacinado Polivalente --}}

                            <fieldset class="col-span-6 sm:col-span-3">
                                <div>
                                    <x-label class="inline-flex" for="nome" :value="__('Vacinado polivalente ?')" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <p class="text-sm text-gray-500">
                                    </p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input wire:model="animal.vacinado_polivalente"
                                            id="animal.vacinado_polivalenteS" name="animal.vacinado_polivalente"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="animal.vacinado_polivalente"
                                            id="animal.vacinado_polivalenteN" name="animal.vacinado_polivalente"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
                                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                            Não
                                        </label>
                                    </div>
                                    @error('animal.vacinado_polivalente') <span
                                        class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>


                            @if ($this->animal != null && $this->animal->vacinado_polivalente)

                            <div class="col-span-6 sm:col-span-3">
                                <!-- Data vacina polivalente -->
                                <div class="mt-4">
                                    <x-label for="vacinado_polivalente_data" :value="__('Data vacinação polivalente')"
                                        class="inline-flex" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input wire:model="animal.vacinado_polivalente_data"
                                        id="vacinado_polivalente_data" class="block mt-1 w-full" type="date"
                                        name="vacinado_polivalente_data" :value="($this->animal->vacinado_polivalente) ? old('vacinado_polivalente_data') : 0" />
                                    @error('animal.vacinado_polivalente_data') <span
                                        class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @endif




                            {{-- Animal de Rua --}}

                            <fieldset class="col-span-6 sm:col-span-3">
                                <div>
                                    <x-label class="inline-flex" for="nome" :value="__('Animal de rua ?')" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <p class="text-sm text-gray-500">
                                    </p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input wire:model="animal.animal_rua" id="animal.animal_ruaS"
                                            name="animal.animal_rua" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="animal.animal_rua" id="animal.animal_ruaN"
                                            name="animal.animal_rua" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
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

                            <fieldset class="col-span-6 sm:col-span-3">
                                <div>
                                    <x-label class="inline-flex" for="nome" :value="__('Animal de ONG ?')" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <p class="text-sm text-gray-500">
                                    </p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input wire:model="animal.animal_ong" id="animal.animal_ongS"
                                            name="animal.animal_ong" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="animal.animal_ong" id="animal.animal_ongN"
                                            name="animal.animal_ong" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
                                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                            Não
                                        </label>
                                    </div>
                                    @error('animal.animal_ong') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>

                            {{-- Animal Castrado --}}

                            <fieldset class="col-span-6 sm:col-span-3">
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
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="animal.animal_castrado" id="animal.animal_castradoN"
                                            name="animal.animal_castrado" type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
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

                            <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                <!-- Observação -->
                                <div class="mt-4">
                                    <x-label for="observacao" :value="__('Observação')" class="inline-flex" />

                                    <textarea wire:model="animal.observacao" id="animal.observacao"
                                        name="animal.observacao" rows="3"
                                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('observacao') }}</textarea>
                                    @error('animal.observacao') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>

                    </div>

                </div>



                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 ">

                            Salvar

                        </button>

                    </span>

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Cancelar

                        </button>

                    </span>

            </form>

        </div>



    </div>

</div>

</div>
