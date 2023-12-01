    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentos') }}
        </h2>
    </x-slot>

    <div class="flex flex-col">
        {{-- @include('admin.documentos.partials._delete-modal') --}}
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Documentos
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="flex rounded-md justify-end">
                                        <a href="{{ route('documentos.create') }}" type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1">
                                            Novo Documento
                                        </a>
                                    </span>
                                 </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($documentos as $documento)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/docs/{{ $documento->path }}"
                                                    target="blank">{{ $documento->nome_arquivo }}</a>
                                            </div>
                                        </div>
                                            {{-- Ícone Setinha com Link --}}
                                            <div class="p-2">
                                                <a href="/docs/{{ $documento->path }}" target="blank">
                                                    <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
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
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap  text-center font-medium">
                                    <a href="{{ route('documentos.edit', $documento) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    <a href="#" wire:click="openModal({{$documento}})" class="text-red-600 hover:text-red-900">Deletar</a>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>