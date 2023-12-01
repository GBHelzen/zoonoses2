<div>
    {{-- Success is as dangerous as failure. --}}

    @livewire('admin.servicos.status-cards')


    <div class="pb-8  items-center lg:flex-row  flex-col">
        @include('admin.servicos.edit-contato')
        @include('admin.servicos.edit-servico')
        @include('admin.servicos.edit-contato')
        @include('admin.servicos.imprimir-guia')
        @include('admin.servicos.modal-cancelamento')
        <div class="grid grid-cols-4 gap-4">
            {{-- Nome --}}
            <div class="col-span-1">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Nome</label>
                <x-input wire:model="busca" type="text" placeholder="Busca por Nome ou CPF"
                    class="w-full sm:text-sm">
                </x-input>
            </div>
            {{-- Código --}}
            <div class="col-span-1">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Código</label>
                <x-input wire:model="codigo" type="text" placeholder="Código do serviço"
                class="w-full sm:text-sm">
                </x-input>
            </div>
            {{-- Grupo da Pessoa --}}
            <div class=" col-span-1">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Grupo da Pessoa</label>
                <select wire:model="condicaoPessoa" id="condicaoPessoa" name="condicaoPessoa"
                    autocomplete="condicaoPessoa"
                    class="w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm">
                    <option value="">Selecione</option>
                    <option value="BRE">Baixa Renda</option>
                    <option value="CAD">CAD Único</option>
                    <option value="PRS">Programa Sociais</option>
                    <option value="POG">População em Geral</option>
                </select>
            </div>
            {{-- Bairro --}}
            <div class=" col-span-1">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Bairro</label>
                <x-input wire:model="bairro" type="text" placeholder="Nome bairro"
                class="w-full sm:text-sm">
                </x-input>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-1 mt-2">
            {{-- Local --}}
            <div class=" col-span-4">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Local</label>
                <select wire:model="local" id="local" name="local" autocomplete="local"
                    class=" w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-200 focus:border-indigo-300 sm:text-sm text-sm">
                    <option value="">Selecione</option>
                    @foreach ($enderecos as $endereco)
                        <option value="{{ $endereco->id }}">
                            {{ $endereco->complemento }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- Tipo Pessoa --}}
            <div class=" col-span-2 ">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Tipo Pessoa</label>
                <select wire:model="buscarPessoaFisica" id="buscarPessoaFisica" name="buscarPessoaFisica"
                    autocomplete="buscarPessoaFisica"
                    class="w-full block border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm">
                    <option value="1">Física</option>
                    <option value="0">Jurídica</option>
                </select>
            </div>
            {{-- Status --}}

            <div class="col-span-2  ">
                <label for="" class=" sm:text-sm text-sm font-medium text-gray-700">Status</label>
                <select wire:model="status" id="status" name="status" autocomplete="status"
                    class="w-full block border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm">
                    <option value="">Todos</option>
                    <option value="aguardando">Aguardando</option>
                    <option value="agendado">Agendado</option>
                    <option value="para_castracao">Para castração</option>
                    <option value="cancelado">Cancelado</option>
                    <option value="confirmado">Confirmado</option>
                </select>
            </div>


                {{-- A partir de --}}
                <div class="col-span-2 ">
                    <label for="" class=" sm:text-sm text-sm font-medium text-gray-700">De</label>
                    <x-input wire:model="de_data" type="date" class="w-full block border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm"></x-input>
                </div>
                {{-- Até --}}
                <div class="col-span-2 ">
                    <label for="" class=" sm:text-sm text-sm font-medium text-gray-700">Até</label>
                    <x-input wire:model="ate_data" type="date" class="w-full block border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-sm"></x-input>
                </div>

        </div>


    </div>
    <x-flash-messages />
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Responsável
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Atendimento
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo de serviço
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data Solicitação
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($servicos as $servico)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- <div class="flex-shrink-0 mr-2">
                                                @if ($servico->ong()->exists())
                                                    <a href="{{ route('admin.ong.show', $servico->ong) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="mr-1 text-gray-500" height="18" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                                        </svg>
                                                    </a>

                                                @else

                                                    <a href="{{ route('admin.pessoas.show', $servico->pessoa) }}">
                                                        <svg class="stroke-current text-gray-500" fill="none"
                                                            height="24" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                                            width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                            </path>
                                                            <polyline points="15 3 21 3 21 9">
                                                            </polyline>
                                                            <line x1="10" x2="21" y1="14" y2="3">
                                                            </line>
                                                        </svg>
                                                    </a>

                                                @endif


                                            </div> --}}
                                            <div class="ml-4 ">

                                                <div class="text-sm font-medium text-gray-700">
                                                    @if ($servico->ong != null)

                                                    <strong class="text-gray-500">ONG:</strong>
                                                        <a class="group cursor-pointer relative inline-block text-blue-400 hover:text-blue-800"
                                                            title="{{Str::length($servico->ong->razao_social) > 19 ? $servico->ong->razao_social : ''}}"
                                                            href="{{ route('admin.ong.show', $servico->ong) }}">
                                                                {{ Str::limit($servico->ong->razao_social, 20) }}
                                                        </a>
                                                    @else
                                                    <a class="group cursor-pointer relative inline-block text-blue-400 hover:text-blue-800"
                                                        title="{{Str::length($servico->pessoa->user->name) > 19 ? $servico->pessoa->user->name : ''}}"
                                                        href="{{ route('admin.pessoas.show', $servico->pessoa) }}">
                                                            {{ Str::limit($servico->pessoa->user->name, 20) }}
                                                    </a>
                                                    @endif

                                                </div>
                                                <div class="text-sm text-gray-500 break-words">
                                                    @if ($servico->ong != null)
                                                           <strong class="text-gray-500">Resp.: </strong><p class="inline-flex">
                                                            <a class="group cursor-pointer relative inline-block text-blue-400 hover:text-blue-800"
                                                                title="{{Str::length($servico->ong->responsavel->user->name) > 19 ? $servico->ong->responsavel->user->name : ''}}"
                                                                href="{{ route('admin.pessoas.show', $servico->ong->responsavel) }}">
                                                                    {{ Str::limit($servico->ong->responsavel->user->name, 20) }}</p>
                                                            </a>
                                                    @else
                                                        {{ $servico->pessoa->user->cpf }}
                                                        @if($servico->pessoa->dadosSocioEconomicos->renda_familiar < 3636.01)
                                                        <span class="" title="Baixa Renda">
                                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex text-yellow-300 rounded-full hover:text-yellow-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                          </svg>
                                                        </span>
                                                        @endif
                                                        @if($servico->pessoa->dadosSocioEconomicos->participa_programa_social)
                                                        <span class="" title="Programa Social">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex text-green-300 rounded-full hover:text-green-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                                          </svg>
                                                        </span>
                                                        @endif
                                                        @if($servico->pessoa->numero_cad_unico)
                                                        <span title="CAD Único">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex text-purple-300 rounded-full hover:text-purple-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                                              </svg>
                                                        </span>
                                                        @endif
                                                    @endif

                                                </div>

                                                <div class="text-sm text-gray-500">
                                                    <strong> Animal: </strong>
                                                    <a class="text-blue-400 hover:text-blue-800"
                                                        href="{{ route('animais.show', $servico->animal) }}" title="{{Str::length($servico->animal->nome) > 19 ? $servico->animal->nome : ''}}">
                                                        {{ Str::limit($servico->animal->nome, 20) }}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-sm text-gray-700">
                                            {{ $servico->atendimento->codigo ?? '' }}
                                        </div>
                                        <div class="flex ">
                                            <div class="flex-shrink-0 text-gray-600  mr-2 text-sm">
                                                {{ $servico->atendimento ? \Carbon\Carbon::parse($servico->atendimento->data)->format('d/m/Y') : 'aguardando' }}
                                            </div>
                                            <div class="text-sm text-gray-600 ">
                                                {{ $servico->atendimento ? \Carbon\Carbon::parse($servico->atendimento->hora)->format('H:i') : '' }}
                                            </div>

                                        </div>
                                        <div class="block  ">
                                            <p class="text-sm text-gray-500 break-words" title="{{$servico->atendimento && $servico->atendimento->localAtendimento ? $servico->atendimento->localAtendimento->complemento : ''}}">
                                                {{ $servico->atendimento && $servico->atendimento->localAtendimento ? Str::limit($servico->atendimento->localAtendimento->complemento, 20) : ''}}

                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4  whitespace-nowrap">

                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $servico->statusLabel() }}" title="{{$servico->atendimento ? $servico->atendimento->justificativa : false}}">

                                            {{ $servico->status }}
                                        </span>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-white">
                                        <span
                                            class="bg-gray-600  px-2 inline-flex text-xs leading-5 font-semibold rounded-full">

                                            {{ $servico->categoria->nome }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">


                                        {{ $servico->data_solicitacao->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap inline-flex  text-xs font-medium gap-1">
                                        @if ($servico->ong == null)
                                            @if ($servico->pessoa->endereco->hasManyOwners())
                                                <a href="{{ route('endereco.pessoas.show', $servico->pessoa->endereco) }}"
                                                    class="inline-flex   bg-red-100 rounded-full">
                                                    <svg class="h-5 w-6   mx-2 my-2  text-red-600"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @endif
                                        @endif

                                        @if ($servico->status != 'cancelado' and $servico->status != 'confirmado')
                                        <a href="#" wire:click="openModal({{ $servico }})"
                                            class="text-white  rounded-full hover:bg-indigo-900 px-2 py-2 bg-indigo-600" title="Atendimento">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </a>
                                        @endif

                                        @if ($servico->atendimento()->exists())
                                            @if($servico->status == 'agendado')
                                                <a href="#" wire:click="{{$servico->atendimento->data >= date("Y-m-d") ? 'openModalContatar(' .$servico.' )' : ''}}"
                                                    @if($servico->contatos->isNotEmpty())
                                                        @if($servico->contatos->contains('status', 'confirmado'))
                                                            class="text-white rounded-full px-2 py-2 bg-green-800 hover:bg-green-600" title="{{date('d/m/Y', strtotime($servico->contatos->last()->data_contato)).' - '.$servico->contatos->last()->status.' - '.$servico->contatos->last()->telefone_contatado.' - '.($servico->contatos->last()->observacao != (null || '') ? Str::limit($servico->contatos->last()->observacao, 25) : '')}}">
                                                        @else
                                                            class="text-white rounded-full hover:bg-blue-500 px-2 py-2 bg-blue-300" title="{{date('d/m/Y', strtotime($servico->contatos->last()->data_contato)).' - '.$servico->contatos->last()->status.' - '.$servico->contatos->last()->telefone_contatado.' - '.($servico->contatos->last()->observacao != (null || '') ? Str::limit($servico->contatos->last()->observacao, 25) : '')}}">
                                                        @endif
                                                    @else
                                                    class="text-white  rounded-full hover:bg-yellow-500 px-2 py-2 bg-yellow-300" title="Contatar">
                                                    @endif
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 3h5m0 0v5m0-5l-6 6M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                                                    </svg>
                                                </a>
                                            @endif

                                            @if($servico->status != 'cancelado' and $servico->status != 'confirmado')
                                            <a href="#" wire:click="openModalGuia({{ $servico }})" title="Imprimir guia"
                                                class="px-2 py-2 bg-green-600  hover:bg-green-800 rounded-full  text-white">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </a>
                                            @endif

                                        @endif
                                        @if($servico->status == 'confirmado' and isset($servico->atendimento->clinica_id))
                                            <span href="#" class="px-2 py-2 bg-green-600  hover:bg-green-800 rounded-full  text-white"
                                            title="{{$servico->atendimento->clinica_id != null ? $servico->atendimento->clinica->nome : false}}">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </span>
                                        @endif

                                        @if ($servico->status != 'cancelado' and $servico->status != 'confirmado')
                                        <a href="#" wire:click="openModalCancelar({{ $servico }})"
                                            class="bg-red-600  hover:bg-red-800 rounded-full px-2 py-2 text-white" title="Excluir">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach


                            <!-- More items... -->
                        </tbody>
                    </table>

                </div>
                <div class="mt-3">
                    {{ $servicos->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
