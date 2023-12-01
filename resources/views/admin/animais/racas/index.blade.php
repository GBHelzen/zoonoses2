<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left pt-1 pr-2">
            {{ __('Raças') }}
        </h2>
        <a href="{{ route('racas.create') }}" title="Adicinar raça"
                class="w-24 h-8 flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                Adicionar
        </a>

    </x-slot>

    <div class="flex flex-col">
        @include('admin.animais.racas.partials._delete-modal')
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="pb-8 items-center lg:flex-row  flex-col">
                    <div class="grid grid-cols-3 gap-1">

                        <div class="col-span-1">
                            <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Nome da raça</label>
                            <x-input wire:model="search" type="text" placeholder="Pesquise pela raça do animal" class="w-full sm:text-sm">
                            </x-input>
                        </div>
                    </div>
                    </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Espécie
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Raça
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($racas as $raca)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$raca->especie->nome}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$raca->nome}}
                                    </div>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$animal->nome}}
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap  text-center font-medium">
                                    <a href="{{ route('racas.edit', $raca) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    @if($raca->animais()->isEmpty())
                                    <a href="#" wire:click="openModal({{$raca}})" class="text-red-600 hover:text-red-900">Deletar</a>
                                    @endif
                                </td>



                            </tr>
                            @empty

                            @endforelse


                            <!-- More items... -->
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $racas->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
