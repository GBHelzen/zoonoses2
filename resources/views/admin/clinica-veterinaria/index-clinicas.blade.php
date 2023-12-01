<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clínicas Veterinárias') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        @include('admin.clinica-veterinaria.partials._delete-modal')
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Clínica
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Endereço
                                </th>
                                 {{-- <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th> --}}
                                {{--
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th> --}}
                                {{--
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th> --}}
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="flex rounded-md justify-end">
                                        <a href="{{ route('clinicas.create') }}" type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1">
                                            Nova Clínica
                                        </a>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($clinicas as $clinica)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                alt="">
                                        </div> --}}
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$clinica->nome}}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{$clinica->telefone}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$clinica->endereco->endereco}},
                                        {{$clinica->endereco->numero}}</div>
                                    <div class="text-sm text-gray-500">{{$clinica->endereco->bairro}}</div>
                                </td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                --}}

                                <td class="px-6 py-4 whitespace-nowrap  text-center font-medium">
                                    <a href="{{ route('clinicas.edit', $clinica) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <a href="#" wire:click="openModal({{$clinica}})" class="text-red-600 hover:text-red-900">Deletar</a>
                                </td>



                            </tr>
                            @empty

                            @endforelse


                            <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
