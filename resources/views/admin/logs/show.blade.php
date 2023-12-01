<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Informações do log') }} <strong> {{$this->log->id}}</strong>
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        @include('_flash-messages')


        <div class="md:grid md:grid-cols-3 md:gap-4">

            <div class="mt-5 md:mt-0 md:col-span-3">

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">


                        <div class="grid grid-cols-12 gap-2">

                            <!-- Causador -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="" :value="__('Causador')" class="inline-flex " />
                                    <span class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input readonly id="" class="block mt-1 w-full" type="text" name=""
                                        value="{{$this->log->causer->name}}" />
                                </div>
                            </div>

                            <!-- Realizado em -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="" :value="__('Realizado na entidade')" class="inline-flex " />
                                    <span class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input readonly id="" class="block mt-1 w-full" type="text" name=""
                                        value="{{ get_class($this->log->subject) }}" />
                                </div>
                            </div>

                            <!-- Identificação  -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="" :value="__('Realizado em (id)')" class="inline-flex " />
                                    <span class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input readonly id="" class="block mt-1 w-full" type="text" name=""
                                        value="{{ $this->log->subject->id }}" />
                                </div>
                            </div>

                            <!-- Tipo de ação -->
                            <div class="col-span-12 sm:col-span-3 ">
                                <div class="mt-4">

                                    <x-label for="" :value="__('Tipo de ação')" class="inline-flex " />
                                    <span class=" ml-1 text-sm text-red-700 inline-flex">*</span>

                                    <x-input readonly id="" class="block mt-1 w-full" type="text" name=""
                                        value="{{$this->log->description}}" />
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                <!-- Dados modificados -->
                                <div class="mt-4">
                                    <x-label for="observacao" :value="__('Alterações')" class="inline-flex" />
                                    <div class="mt-2">
                                        @dump($this->log->changes)
                                    </div>

                                </div>

                            </div>

                            <div class="col-span-12 sm:col-span-12 lg:col-span-12">
                                <!-- Propriedades -->
                                <div class="mt-4">
                                    <x-label for="observacao" :value="__('Propriedades')" class="inline-flex" />
                                    <div class="mt-2">
                                        @dump($this->log->properties)
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
                        <a href="{{ url()->previous() }}" type="button"
                            class="py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Voltar
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>