@if ($openModal)
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
                    <h3 class="text-lg leading-6 font-medium text-gray-900 ml-4" id="modal-headline">
                        <strong>Agendamento/Atendimento</strong>
                    </h3>
                </div>
                <form>

                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        {{-- Form Grid --}}
                        <div class="grid grid-cols-6 gaps-6">
                            <!-- Data comparecimento da palestra-->
                            <div class="col-span-6 sm:col-span-6">
                                <div class="mt-4">
                                    <x-label for="data" :value="__('Data comparecimento palestra')"
                                        class="inline-flex" />
                                    <span class="inline-flex ml-1 text-sm text-red-700 ">*</span>

                                    <x-input wire:model="atendimento.data" class="block mt-1 w-full" type="date"
                                        name="data" :value="old('data')"></x-input>
                                    @error('atendimento.data') <span class="text-red-700">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <!-- Hora comparecimento da palestra -->
                            <div class="col-span-6 sm:col-span-6">
                                <div class="mt-4">
                                    <x-label for="hora" :value="__('Hora comparecimento palestra')"
                                        class="inline-flex" />


                                    <x-input wire:model="atendimento.hora" class="block mt-1 w-full" type="time"
                                        name="hora" value="{{ old('hora') }}"></x-input>
                                    @error('atendimento.hora') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Temas -->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                <div class="mt-4">
                                    <x-label for="temas" :value="__('Temas')" class="inline-flex" />
                                        <select wire:model="atendimento.temas" id="temas" name="temas"
                                    autocomplete="temas"
                                    class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm text-sm">
                                    <option value="">Selecione um tema...</option>
                                        <option value="PR-PUPA">Posse Responsável - Programa União pelos Animais (PUPA)</option>
                                </select>
                                    @error('atendimento.temas') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Local --}}
                            <div class="col-span-6 my-2 ">
                                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Local</label>
                                <select wire:model="atendimento.local_id" id="local_id" name="local_id"
                                    autocomplete="local_id"
                                    class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm text-sm">
                                    <option value="">Selecione</option>
                                    @foreach ($enderecos as $endereco)
                                        <option value="{{ $endereco->id }}">
                                            {{ $endereco->complemento }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('atendimento.local_id') <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Presença --}}
                            @if ($this->atendimento->exists)


                                <fieldset class="col-span-6 sm:col-span-3">
                                    <div>
                                        <x-label class="inline-flex" for="presenca"
                                            :value="__('Foi presente nas palestras?')" />
                                        <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                        <p class="text-sm text-gray-500">
                                        </p>
                                    </div>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-center">
                                            <input wire:model="atendimento.presenca" id="presencaS" name="presenca"
                                                type="radio"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                                value="1">
                                            <label for="push_everything"
                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                Presente
                                            </label>
                                        </div>
                                        <div class="flex items-center">
                                            <input wire:model="atendimento.presenca" id="presencaN" name="presenca"
                                                type="radio"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                                value="0">
                                            <label for="push_email"
                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                Ausente
                                            </label>
                                        </div>
                                        @error('atendimento.presenca') <span
                                                class="text-red-700">{{ $message }}</span>
                                        @enderror

                                        @error('servico.status') <span
                                                class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </fieldset>

                                @if ($this->atendimento->presenca == false && $this->atendimento->presenca != null && $servico->status)
                                <!-- Justificativa -->
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                        <div class="mt-4">
                                            <x-label for="justificativa" :value="__('Justificativa')"
                                                class="inline-flex" />

                                            <textarea wire:model="atendimento.justificativa" id="justificativa"
                                                name="justificativa" rows="3"
                                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('justificativa') }}</textarea>
                                            @error('atendimento.justificativa') <span
                                                    class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @elseif($this->atendimento->presenca == 1)
                                    <fieldset class="col-span-6 sm:col-span-3 mt-2">
                                        <div>
                                            <x-label class="inline-flex" for="guia_entregue"
                                                :value="__('Foi entregue a guia de castração?')" />
                                            <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                            <p class="text-sm text-gray-500">
                                            </p>
                                        </div>
                                        <div class="mt-4 space-y-4">
                                            <div class="flex items-center">
                                                <input wire:model="atendimento.guia_entregue" id="guia_entregueS" name="guia_entregue"
                                                    type="radio"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                                    value="1">
                                                <label for="push_everything"
                                                    class="ml-3 block text-sm font-medium text-gray-700">
                                                    Sim
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input wire:model="atendimento.guia_entregue" id="guia_entregueN" name="guia_entregue"
                                                    type="radio"
                                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                                    value="0">
                                                <label for="push_email"
                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                    Não
                                                </label>
                                            </div>
                                            @error('atendimento.guia_entregue') <span
                                                    class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>

                                </fieldset>


                                @endif

                            @endif

                            @if($this->servico->status == 'para_castracao')
                            <fieldset class="col-span-6 sm:col-span-3 mt-2">
                                <div>
                                    <x-label class="inline-flex" for="executada"
                                        :value="__('Guia executada?')" />
                                    <span class="ml-1 text-sm text-red-700 inline-flex">*</span>
                                    <p class="text-sm text-gray-500">
                                    </p>
                                </div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input wire:model="atendimento.executada" id="executadaS" name="executada"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        <label for="push_everything"
                                            class="ml-3 block text-sm font-medium text-gray-700">
                                            Sim
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input wire:model="atendimento.executada" id="executadaN" name="executada"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
                                        <label for="push_email"
                                        class="ml-3 block text-sm font-medium text-gray-700">
                                            Não
                                        </label>
                                    </div>
                                    @error('atendimento.executada') <span
                                            class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                                @if($this->atendimento->executada == true)
                                        <div class="col-span-6 sm:col-span-6">
                                            <div class="mt-4">
                                                <x-label for="data" :value="__('Data castração do animal')"
                                                class="inline-flex" />
                                                <span class="inline-flex ml-1 text-sm text-red-700 ">*</span>

                                                <x-input wire:model="atendimento.data_castracao" class="block mt-1 w-full"
                                                type="date" name="data_castracao" :value="old('data_castracao')">
                                            </x-input>
                                            @error('atendimento.data_castracao') <span
                                            class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                    <!-- Justificativa -->
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                        <div class="mt-4">
                                            <x-label for="justificativa" :value="__('Justificativa')"
                                                class="inline-flex" />

                                            <textarea wire:model="atendimento.justificativa" id="justificativa"
                                                name="justificativa" rows="3"
                                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('justificativa') }}</textarea>
                                            @error('atendimento.justificativa') <span
                                                    class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                            @endif

                        </div>
                    </div>
                    <!--footer-->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button wire:click="storeServicoAntedimento()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 ">
                                Salvar
                            </button>
                        </span>

                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="$set('openModal', false)" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancelar
                            </button>
                        </span>

                    </div>
                </form>

            </div>

        </div>
@endif
