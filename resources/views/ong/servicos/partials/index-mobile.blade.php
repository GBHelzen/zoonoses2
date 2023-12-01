<div class="visible md:invisible lg:invisible xl:invisible    flex flex-col space-y-4 justify-center items-center">

    <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
        <span class=" block text-lg py-4 pl-4 font-bold text-gray-900 sm:text-lg">Seu histórico de
            serviços </span>
    </h2>
    @foreach ($servicos as $servico)
        <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
            <div class="p-2">

            </div>
            <div class="flex-grow p-2">
                <div class="font-semibold text-gray-700">
                    {{ Str::limit($servico->animal->nome, 20) }}
                </div>

                <div class="text-gray-700 text-sm">
                    Agendado para o dia: <strong>
                        {{ $servico->atendimento ? \Carbon\Carbon::parse($servico->atendimento->data)->format('d/m/Y') . ' ' . $servico->atendimento->hora : 'aguardando agendamento' }}</strong>
                </div>
                <div class="text-gray-700 text-sm">
                    Local: <strong>
                        {{ $servico->atendimento && $servico->atendimento->localAtendimento ? $servico->atendimento->endereco : '' }}</strong>
                </div>

                <div class="text-xs text-gray-500">
                    Castração solicitada em {{ $servico->data_solicitacao->format('d/m/Y') }}
                </div>
            </div>

            <div class="flex-grow text-sm text-right align-top ">
                <span
                    class="px-2 inline-flex  text-xs leading-5 font-semibold rounded-full {{ $servico->statusLabel() }}">

                    {{ $servico->status }}
                </span>
              
            </div>

            <div class="flex items-center ">


            </div>
        </div>
    @endforeach
</div>
