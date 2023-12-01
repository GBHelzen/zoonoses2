<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <h2 class="mt-5 text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
        <span class="  py-4 pl-4 text-gray-700 inline-flex font-bold mb-3 text-lg">Animais </span>
    </h2>

    @foreach ($animais as $animal)
    <div class="mt-5 bg-white w-full flex items-center p-4 rounded-xl shadow border">

        <div class="flex items-center">
            <div class="flex-shrink-0 mr-2">
                <a href="{{ route('animais.show', $animal) }}">
                    <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                        </path>
                        <polyline points="15 3 21 3 21 9">
                        </polyline>
                        <line x1="10" x2="21" y1="14" y2="3">
                        </line>
                    </svg>
                </a>
            </div>

            <div class="font-semibold text-gray-700">

                {{ $animal->nome }}
            </div>

        </div>
        <div class="flex-grow p-2">

            <div class="text-sm text-gray-500">
                {{ $animal->especie }}, {{ $animal->sexo }}
            </div>

        </div>

        <div class="flex items-center ">
            <div class="text-sm text-gray-400">
                {{ $animal->idade }} meses
            </div>
        </div>
    </div>
    @endforeach
</div>