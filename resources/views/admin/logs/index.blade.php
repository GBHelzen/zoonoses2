<div>
    {{-- Be like water. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>

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
                                    Causador
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Realizado em
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo de ação
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Criado em
                                </th>
                                {{-- <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Atualizado em
                                </th> --}}
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($logs as $log)
                            {{-- @livewire('admin.servico-atendimento-item', ['servico' => $servico], key($servico->id)) --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 mr-2">
                                            <a href="#">
                                                <svg class="stroke-current text-gray-500" fill="none" height="24"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" viewbox="0 0 24 24" width="24"
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
                                        <div class="ml-4 ">


                                            <div class="text-sm font-medium text-gray-900">
                                                {{$log->causer ? $log->causer->name : ''}}
                                            </div>
                                            {{-- <div class="text-sm text-gray-500">
                                                {{$servico->pessoa->user->cpf}}
                                        </div> --}}

                                    </div>
                </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-2">
                            <a href="#">
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
                        <div class="ml-4">
                            <div class="text-sm text-gray-900">
                                {{ $log->subject ? get_class($log->subject) : '' }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4  whitespace-nowrap">

                    {{$log->description}}

                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-white">
                    <span class="bg-gray-600  px-2 inline-flex text-xs leading-5 font-semibold rounded-full">

                        {{$log->created_at->format('d/m/Y')}}
                    </span>
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                    <a href="{{ route('logs.show', $log) }}"
                        class="text-indigo-600 hover:text-indigo-900">Visualizar</a>


                </td>
                {{-- <td class="px-6 py-4 whitespace-nowrap  text-xs font-medium">

                </td> --}}
                </tr>
                @endforeach


                <!-- More items... -->
                </tbody>
                </table>

            </div>
            <div class="mt-3">
                {!! $logs->links() !!}
            </div>
        </div>

    </div>
</div>
</div>