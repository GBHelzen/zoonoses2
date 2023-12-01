    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left pt-1 pr-2">
            {{ __('Usuários') }}
        </h2>
            <a href="/cadastro" title="Adicinar usuário"
                class="w-24 h-8 flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                Adicionar
            </a>
    </x-slot>
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="pb-8 items-center lg:flex-row  flex-col">
        <div class="grid grid-cols-3 gap-1">

            <div class="col-span-1">
                <label for="" class="sm:text-sm text-sm font-medium text-gray-700">Nome</label>
                <x-input wire:model="search" type="text" placeholder="Pesquise pelo nome ou CPF" class="w-full sm:text-sm">
                </x-input>
            </div>
        </div>
        </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    CPF
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>

                                    <td class="px-6 py-4  whitespace-nowrap">

                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ">

                                            {{ $user->name }}
                                        </span>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-white">
                                        <span
                                            class="bg-gray-600  px-2 inline-flex text-xs leading-5 font-semibold rounded-full">

                                            {{ $user->cpf }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">

                                        {{ $user->email }}

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap inline-flex  text-xs font-medium gap-1 text-center">

                                                <a href="{{ route('pessoas.edit-password', $user->id) }}" title="Editar"
                                                    class="px-2 py-2 bg-blue-600  hover:bg-blue-800 rounded-full text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                                <a href="{{ route('pessoas.add-roles', $user->id) }}" title="Adicionar papéis"
                                                    class="px-2 py-2 bg-green-600  hover:bg-green-800 rounded-full text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                                      </svg>
                                                </a>
                                                @canBeImpersonated($user)
                                                <span class="flex rounded-md justify-end">
                                                <a href="{{ route('impersonate', $user->id) }}" type="button"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 xs:text-xs xs:leading-5 xs:px-2 xs:py-1">
                                                    Logar
                                                </a>
                                                </span>
                                                @endCanBeImpersonated

                                    </td>
                                </tr>
                            @endforeach


                            <!-- More items... -->
                        </tbody>
                    </table>

                </div>
                <div class="mt-3">
                    {{ $users->links() }}
                </div>

            </div>

        </div>
    </div>
</div>
