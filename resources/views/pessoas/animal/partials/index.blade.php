<div
    class="   shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    @if($modalOpen)

    @include('pessoas.animal.create')

    @endif

    @if($destroyAnimal)

    @include('pessoas.animal.destroy')

    @endif

    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
        <span class="block text-lg py-4 pl-4 font-bold text-gray-900 sm:text-lg">Seus animais </span>
    </h2>

    <table class=" min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Espécie
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Idade(meses)
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Sexo
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Serviços
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Palestras em aberto
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Contatos
                </th>
                <th scope="col" class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                    {{-- @if(Auth::user()->pessoa->animais()->count() >= 2 and
                    Auth::user()->pessoa->dadosSocioEconomicos->renda_familiar >= 3636.01 and
                    !Auth::user()->pessoa->dadosSocioEconomicos->participa_programa_social and
                    Auth::user()->pessoa->numero_cad_unico == null) --}}
                    @if(Auth::user()->pessoa->perfilCompleto())
                        @if(Auth::user()->pessoa->naoEletivo() and Auth::user()->pessoa->animais()->count() >= 2)
                        <div class="flex rounded-md justify-end">
                            <span
                                class=" rounded-full text-sm text-white font-bold bg-yellow-300 px-2.5 -py-2 items-center">
                                Máximo de animais atingido
                            </span>
                        </div>
                        @else
                            @if(Auth::user()->pessoa->animais()->count() < 4)
                            <span class="flex rounded-md justify-end">
                                <a wire:click="openModal" href="#" type="button"
                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1">
                                    Novo Animal
                                </a>
                            </span>
                            @else
                            <div class="flex rounded-md justify-end">
                                <span
                                    class=" rounded-full text-sm text-white font-bold bg-yellow-300 px-2.5 -py-2 items-center">
                                    Máximo de animais atingido
                                </span>
                            </div>
                            @endif
                        @endif
                    @endif
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($animais as $animal)
            <tr>
                <td class="px-6 py-4 text-center whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">
                        {{ $animal->nome }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $animal->especie }}</div>
                    {{-- <div class="text-sm text-gray-500">Optimization</div> --}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold ">
                        {{ $animal->idade }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $animal->sexo }}
                </td>
                <td class="items-center">
                    @if($animal->servico_em_aberto)
                    <span
                        class="py-2 px-1 items-center font-medium  text-xs rounded text-white bg-green-500 hover:bg-green-600  transition ease-in-out duration-150">
                        Castração Solicitada! </span>
                        @elseif($animal->servico_concluido or $animal->animal_castrado)
                        <span
                        class="py-2 px-1 items-center font-medium  text-xs rounded text-white bg-green-700 hover:bg-green-900  transition ease-in-out duration-150">
                        Animal Castrado! </span>
                        @else
                        <button wire:click="solicitarCastracao({{$animal}})"
                        class="items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Solicitar
                        castração</button>
                    @endif
                </td>
                <td class="items-center text-center text-orange-600">
                    @if($animal->palestra_em_aberto != '' and $animal->servicos())
                        <span class="text-blue-700 font-bold">
                            {{$animal->palestra_em_aberto}}
                        </span>
                    @endif


                </td>
                <td class="px-6 py-4 whitespace-nowrap inline-flex  text-xs font-medium gap-1">
                    @forelse ($animal->servicos->sortBy('asc') as $servico)
                    @if($servico->contatos->isNotEmpty() and $servico->status == ('para_castracao' || 'agendado'))
                        @if($servico->contatos->contains('status', 'confirmado'))
                            <span class="py-2 px-2 items-center rounded-full font-medium  text-xs text-white bg-green-800 hover:bg-green-600  transition ease-in-out duration-150" title="{{date('d/m/Y', strtotime($servico->contatos->last()->data_contato)).' - '.$servico->contatos->last()->status.' - '.$servico->contatos->last()->telefone_contatado.' - '.($servico->contatos->last()->observacao != (null || '') ? Str::limit($servico->contatos->last()->observacao, 25) : '')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            @break;
                            @else
                            <span class="py-2 px-2 items-center rounded-full font-medium  text-xs text-white bg-yellow-500 hover:bg-yellow-600  transition ease-in-out duration-150" title="{{date('d/m/Y', strtotime($servico->contatos->last()->data_contato)).' - '.$servico->contatos->last()->status.' - '.$servico->contatos->last()->telefone_contatado.' - '.($servico->contatos->last()->observacao != (null || '') ? Str::limit($servico->contatos->last()->observacao, 25) : '')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                                </svg>
                            </span>
                            @break;
                        @endif
                    @endif
                        @empty
                            {{false}}
                        @endforelse
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a wire:click="edit({{$animal}})" href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                    @if(!$animal->servico_em_aberto and !$animal->servico_concluido)
                    <a wire:click="destroy({{$animal}})" href="#" class="text-red-600 hover:text-red-900">Deletar</a>
                    @endif
                </td>
            </tr>
            @endforeach


            <!-- More items... -->
        </tbody>
    </table>
</div>
