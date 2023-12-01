<div class="hidden md:block shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto ">
            <div class="py-2 align-middle inline-block min-w-full ">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        <span class="block text-lg py-4 pl-4 font-bold text-gray-900 sm:text-lg">Seu histórico de
                            serviços </span>
                    </h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>

                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Animal
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
                                    Atendimento
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($servicos as $servico)
                                <tr>

                                    <td class="px-6 py-4 text-center  whitespace-nowrap">
                                        <div class="">
                                            <div class="text-sm text-gray-900">
                                                {{ Str::limit($servico->animal->nome, 20) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center  whitespace-nowrap">

                                        <span
                                            class="px-2 inline-flex  text-xs leading-5 font-semibold rounded-full {{ $servico->statusLabel() }}">

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
                                    <td class="px-6 py-4 text-center  whitespace-nowrap text-sm text-gray-900">
                                        <div>
                                            <strong>
                                                @if($servico->status == 'cancelado')
                                                <span class="px-2 inline-flex  text-xs leading-5 font-semibold rounded-full uppercase {{ $servico->statusLabel() }}">
                                            {{ (!empty($servico->atendimento->justificativa) ? $servico->atendimento->justificativa : 'Solicitação de serviço cancelada. Para mais informações, entre em contato com a Zoonoses!') }}
                                                </span>
                                        @else
                                        {{ $servico->atendimento ? \Carbon\Carbon::parse($servico->atendimento->data)->format('d/m/Y') . ' ' . $servico->atendimento->hora : 'aguardando agendamento' }}
                                                {{ $servico->atendimento && $servico->atendimento->localAtendimento ? $servico->atendimento->endereco : 'Sem local informado' }}
                                            @endif
                                            </strong>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            <!-- More items... -->
                        </tbody>
                    </table>

                </div>

                {{ $servicos->links() }}


            </div>

        </div>
    </div>

</div>
