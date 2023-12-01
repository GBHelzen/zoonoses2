<div>
    {{-- In work, do what you enjoy. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Endereço') }} <strong> {{$this->endereco->endereco}}</strong>
        </h2>
    </x-slot>

    <div class="bg-white w-full flex items-center p-6 rounded-xl shadow border">
        <div class="p-2">
            <div
                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <!-- Heroicon name: outline/exclamation -->
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </div>

        </div>
        <div class="flex-grow p-2">
            <div class="font-semibold text-gray-700">
                {{ $this->endereco->endereco  }}, {{ $this->endereco->numero  }}, {{ $this->endereco->bairro  }}
            </div>

        </div>

        <div class="flex items-center ">
            <span>Total de pessoas neste Endereço <strong> {{ $this->endereco->pessoas->count()}} </strong> </span>
        </div>
    </div>




    @forelse ($pessoas as $pessoa)
    <div class=" my-8 bg-white w-full flex items-center p-6 rounded-xl shadow border">
        <div class="p-2">


        </div>
        <div class="flex-grow p-2">
            <div class="flex items-center">
                <div class="flex-shrink-0 mr-2">
                    <a href="{{ route('admin.pessoas.show', $pessoa) }}">
                        <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                            width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                            </path>
                            <polyline points="15 3 21 3 21 9">
                            </polyline>
                            <line x1="10" x2="21" y1="14" y2="3">
                            </line>
                        </svg>
                    </a>
                </div>
                <div class="ml-4 ">


                    <div class="text-sm font-medium text-gray-900">
                        {{$pessoa->user->name}}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{$pessoa->user->cpf}}
                    </div>

                </div>
            </div>

        </div>

        <div class="flex items-center ">
            <span>Pessoa cadastrada em <strong> {{  \Carbon\Carbon::parse($pessoa->created_at)->format('d/m/Y H:i') }} </strong> </span>
        </div>
    </div>
    @empty

    @endforelse

</div>