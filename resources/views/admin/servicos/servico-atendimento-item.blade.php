<div>

    <div>
        @include('livewire.admin.edit-servico')

        {{-- Nothing in the world is as soft and yielding as water. --}}
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">

                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$servico->pessoa->user->name}}
                        </div>

                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                    {{$servico->animal->nome}}
                </div>
            </td>
            <td class="px-6 py-4  whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{$servico->statusLabel()}}">

                    {{$servico->status}}
                </span>

            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                <span class="bg-gray-600  rounded-full px-2 py-1">

                    {{$servico->categoria->nome}}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">


                {{$servico->data_solicitacao->format('d/m/Y')}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                <a href="#" wire:click="openModal()"
                    class="text-indigo-600 hover:text-indigo-900">Atendimento</a>
            </td>
        </tr>

    </div>
</div>