@if ($openModalGuia)


<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
        Background overlay, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">

                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Gerar guia
                        </h3>

                        <div class="mt-2 relative p-6 flex-auto">
                            <x-flash-messages />
                            <div class="grid grid-cols-6 gaps-6">
                                {{-- Presença --}}

                                <fieldset class="col-span-6 sm:col-span-3">
                                    {{-- <div>
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
                                        @error('atendimento.presenca') <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                </fieldset>

                                {{-- @if ($this->atendimento != null &&!$this->atendimento->presenca)
                                <!-- Justificativa -->
                                <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                    <div class="mt-4">
                                        <x-label for="justificativa" :value="__('Justificativa')" class="inline-flex" />

                                        <textarea wire:model="atendimento.justificativa" id="justificativa"
                                            name="justificativa" rows="3"
                                            class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('justificativa') }}</textarea>
                                        @error('atendimento.justificativa') <span
                                            class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @endif --}}



                                <div class="inline-flex  col-span-6 sm:col-span-6 lg:col-span-6 mt-5">
                                    <label for=""
                                        class="lg:mr-4 inline-flex sm:text-sm text-sm font-medium text-gray-700">Clínica
                                        Veterinária</label>
                                    <select wire:model="clinica_id" id="clinica_id" name="clinica_id"
                                        autocomplete="clinica_id"
                                        class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm"
                                        required>
                                        <option value="0">Selecione</option>
                                        @forelse ($this->clinicas as $key => $clinica)
                                        <option value="{{$clinica->id}}" id="{{$key}}">{{ $clinica->nome }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('clinica_id') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($clinica_id)
                                <div class="col-span-6 sm:col-span-6 lg:col-span-6 mt-5">
                                    <button type="button" wire:click="imprimirGuia()"
                                        class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-white text-base font-medium  hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0  sm:w-auto sm:text-sm">
                                        <svg class=" h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Imprimir Guia
                                    </button>
                                </div>
                                @endif


                                <div class=" col-span-6 sm:col-span-6 lg:col-span-6 mt-5 w-full" wire:loading>
                                    <x-button-loading>
                                        </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" wire:click="$set('openModalGuia', false)"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm font-bold">
                    Fechar
                </button>
                {{-- <button type="button" wire:click="saveGuia()"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-white text-base font-medium  hover:opacity-80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Salvar
                </button> --}}
            </div>
        </div>
    </div>
</div>

@endif
