<div class="visible md:hidden lg:hidden xl:hidden    flex flex-col space-y-4 justify-center items-center">

    {{-- @if($destroyAnimal)

    @include('livewire.animal.destroy')

    @endif --}}
    <div class="w-full justify-end">
        <span class="flex rounded-md justify-end">
            <a href="{{ route('ong.animais.create', Auth::user()->pessoa->ong) }}" type="button"
                class="inline-flex  px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1">
                Novo Animal
            </a>
        </span>
    </div>

    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
        <span class="block text-lg py-4 pl-4 font-bold text-gray-900 sm:text-lg">Seus animais </span>
    </h2>
    @foreach ($animais as $animal)
    <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
        <div class="p-2">
            <a href="{{ route('ong.animais.edit', [Auth::user()->pessoa->ong, $animal]) }}"
                class="text-indigo-600 hover:text-indigo-900">
                <svg class="mr-1 h-5 w-5 text-gray-900 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                </svg>
            </a>
            <a wire:click.prevent="destroy({{$animal}})" href="#" class="text-red-600 hover:text-red-900 block">
                <svg class="mr-1 h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                    </path>
                </svg>
            </a>
        </div>
        <div class="flex-grow p-2">
            <div class="font-semibold text-gray-700">
                {{ $animal->nome }}
            </div>
            <div class="text-sm text-gray-500">
                {{ $animal->especie }}, {{ $animal->sexo }}
            </div>
            <div class="text-sm text-gray-400">
                {{ $animal->idade }} meses
            </div>
        </div>

        <div class="flex items-center ">
            @if($animal->servico_em_aberto)
            <span
                class="py-2 px-1 items-center font-medium  text-xs rounded text-white bg-green-500 hover:bg-green-600  transition ease-in-out duration-150">
                Castração Solicitada! </span>
            @else
            <button wire:click="solicitarCastracao({{$animal}})"
                class="items-center px-1 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Solicitar
                castração</button>
            @endif

        </div>
    </div>
    @endforeach
</div>