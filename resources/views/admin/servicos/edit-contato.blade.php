@if ($openModalContatar)
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
                        <strong>Contato</strong>
                        {{-- {{$servico->pessoa->telefone}} --}}
                    </h3>
                </div>
                <form>

                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        {{-- Form Grid --}}
                        <div class="grid grid-cols-6 gaps-6">
                            <!-- Data do contato-->
                            <div class="col-span-6 sm:col-span-6">
                            <input type="hidden"  wire:model="contato.servico_id" :value="{{$servico->id}}">
                                <div class="mt-4">
                                    <x-label for="data" :value="__('Data contato')"
                                        class="inline-flex" />
                                    <span class="inline-flex ml-1 text-sm text-red-700 ">*</span>

                                    <x-input wire:model="contato.data_contato" class="block mt-1 w-full" type="date"
                                        name="data_contato" :value="old('data_contato')" required="true"></x-input>
                                    @error('contato.data_contato') <span class="text-red-700">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <!-- Número de telefone usado para contatar -->
                            <div class="col-span-6 sm:col-span-6">
                                <div class="mt-4">
                                    <x-label for="telefone_contatado" :value="__('Número contatado')"
                                        class="inline-flex" /><span class="inline-flex ml-1 text-sm text-red-700 ">*</span>
                                    <x-masked-input :mask="'(99) 99999-9999'" wire:model="contato.telefone_contatado" id="telefone_contatado" class="block mt-1 w-full" type="text"
                                    name="telefone_contatado" required/>
                                    @error('contato.telefone_contatado') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="col-span-6 my-2 ">
                                <label for="" class="sm:text-sm text-sm font-medium text-gray-700 inline-flex">Status</label><span class="inline-flex ml-1 text-sm text-red-700 ">*</span>
                                <select wire:model="contato.status" id="status" name="status"
                                    autocomplete="status"
                                    class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm text-sm">
                                    <option value="">Selecione</option>
                                    <option value="confirmado">CONFIRMADO</option>
                                    <option value="desistente">DESISTENTE</option>
                                    <option value="fracassado">FRACASSADO</option>
                                </select>
                                @error('contato.status') <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Observação -->
                            <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                                <div class="mt-4">
                                    <x-label for="observacao" :value="__('Obeservações')" class="inline-flex" />

                                    <textarea wire:model="contato.observacao" id="observacao" name="observacao" rows="3"
                                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('observacao') }}</textarea>
                                    @error('contato.observacao') <span class="text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--footer-->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                            <button wire:click="storeContato()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 ">

                                Salvar

                            </button>

                        </span>

                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                            <button wire:click="$set('openModalContatar', false)" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                Cancelar

                            </button>

                        </span>

                    </div>

                </form>

            </div>

        </div>
@endif
