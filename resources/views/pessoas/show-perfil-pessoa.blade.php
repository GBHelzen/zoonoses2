<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>


    <div class="w-full fixed z-10 inset-0 overflow-y-auto ease-out duration-400">

        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



            <div class="fixed inset-0 transition-opacity">

                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

            </div>



            <!-- This element is to trick the browser into centering the modal contents. -->

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">


                <div class=" ">


                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Informações do perfil <strong> {{$this->pessoa->user->name}} </strong>
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Personal details and application.
                                </p>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Nome Completo
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->user->name}}
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            CPF
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->user->cpf}}
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Telefone
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->telefone}}
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            RG
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->rg}}
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Endereço
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->endereco->endereco}},
                                            {{$this->pessoa->endereco->numero}},
                                            {{$this->pessoa->endereco->bairro}}


                                        </dd>
                                    </div>
                                    {{-- <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Attachments
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                            resume_back_end_developer.pdf
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                                            Download
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                                            coverletter_back_end_developer.pdf
                                                        </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                            class="font-medium text-indigo-600 hover:text-indigo-500">
                                                            Download
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </dd>
                                    </div> --}}

                                    <div class=" px-4 py-5  sm:px-6">
                                        <div class="text-sm font-medium text-gray-500">
                                            <strong> Dados Socioeconomicos </strong>
                                        </div>

                                    </div>

                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Renda Familiar
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->dadosSocioEconomicos->renda_familiar}}

                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                           Quantidade de pessoas em domicilio
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{$this->pessoa->dadosSocioEconomicos->pessoas_em_domicilio}}

                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                           Programas socias
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            @if ($this->pessoa->dadosSocioEconomicos->programas_sociais)
                                                    @foreach ($this->pessoa->dadosSocioEconomicos->programas_sociais as $programa)
                                                        {{$programa}} <br>
                                                    @endforeach
                                            @endif

                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                           Animais
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                           Quantidade cachorro macho: {{$this->pessoa->dadosSocioEconomicos->quantidade_cachorro_macho}} <br>
                                           Quantidade cachorro femea: {{$this->pessoa->dadosSocioEconomicos->quantidade_cachorro_femea}}  <br>
                                           Quantidade gato macho: {{$this->pessoa->dadosSocioEconomicos->quantidade_gato_macho}}  <br>
                                           Quantidade gato femea: {{$this->pessoa->dadosSocioEconomicos->quantidade_gato_femea}}

                                        </dd>
                                    </div>
                                    </h3>
                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
                <!--footer-->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        <a href="{{ url()->previous() }}"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 ">

                            OK

                        </a>

                    </span>

                    {{-- <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                        <a href="{{ url()->previous() }}"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Cancelar

                        </a>

                    </span> --}}


                </div>

            </div>

        </div>
    </div>

    {{-- @include('livewire._perfil') --}}
