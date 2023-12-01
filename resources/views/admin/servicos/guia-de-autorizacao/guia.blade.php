<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prefeitura Municipal de Boa Vista | Guia de Autorização de Castramento</title>

    <style>
        .titulo {
            font-size: 0.8rem;
            text-align: center;
        }



        .brasao {
            text-align: center;
            margin-bottom: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .cabecalho {
            display: block;
            font-size: 0.8em;
            padding-bottom: 5px;
            margin-left: 30px;
            width: 100%;
            text-align: center;
        }
    </style>

    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="">
        {{-- brasao --}}
        <div class="text-center block ">
            <img class="h-24 " src="{{public_path('img/logos/brasao.png')}}">
        </div>

        {{-- Cabeçalho --}}
        <div class=" block text-center font-medium text-lg">
            <h4 class="">PREFEITURA MUNICIPAL DE BOA VISTA</h4>
            <h4 class="-mt-3">SECRETARIA MUNICIPAL DE SAÚDE</h4>
            <h4 class="-mt-3"> SUPERINTENDÊNCIA DE VIGILÂNCIA EM SAÚDE </h4>

            <div class="text-base">
                UNIÃO PELOS ANIMAIS
            </div>
            <div class="my-1 text-base">

                GUIA DE AUTORIZAÇÃO DE SERVIÇO
            </div>
        </div>

        {{-- Protocolo --}}
        <div class="text-center py-1">
            Protocolo N° {{ $data[9]->codigo ?? '' }} -  Boa Vista-RR, {{\Carbon\Carbon::now()->format('d/m/Y')}}
        </div>
        {{-- Centralizando o corpo --}}
        <div class="ml-20 mr-11 text-justify">
            {{-- Dados da pessoa --}}
            <div class="mt-3">
                <div class="font-medium">
                    DADOS DO TUTOR OU RESPONSÁVEL PELO ANIMAL
                </div>

                <div class="inline ">
                    Nome: <p class="ml-2 font-medium inline">{{$data[0]->name}}</p>
                </div>
                <div>
                    Telefone: <p class="ml-2 font-medium inline">{{$data[1]->telefone}} </p>
                    Idade: <p class="ml-2 font-medium inline">{{\Carbon\Carbon::parse($data[1]->nascimento)->age }}</p>
                </div>
                <div class=" ">
                    CPF: <p class="ml-2 font-medium inline">{{$data[0]->cpf}} </p>
                    RG: <p class="ml-2 font-medium inline">{{$data[1]->rg}} </p>

                </div>

                @if ($data[8]->ong == null)
                <div class=" ">
                    Endereço: <p class="ml-2 font-medium inline">{{$data[2]->endereco}}, {{$data[2]->numero}},
                        {{$data[2]->bairro}}</p>
                </div>
                @endif


            </div>

            {{-- Dados da ONG --}}
            @if ($data[8]->ong != null)
            <div class="mt-5">
                <div class="font-medium">
                    DADOS DA ENTIDADE NÃO GOVERNAMENTAL
                </div>

                <div class="inline ">
                    Nome: <p class="ml-2 font-medium inline">{{$data[7]->razao_social}}</p>
                </div>
                <div>
                    Telefone: <p class="ml-2 font-medium inline">{{$data[7]->telefone}} </p>
                </div>
                <div class=" ">
                    CNPJ: <p class="ml-2 font-medium inline">{{$data[7]->cnpj}} </p>

                </div>

                <div class=" ">
                    Endereço: <p class="ml-2 font-medium inline">{{$data[2]->endereco}}, {{$data[2]->numero}},
                        {{$data[2]->bairro}}</p>
                </div>


            </div>
            @endif
            {{-- Dados do animal --}}
            <div class="mt-5">
                <div class="font-medium">
                    DADOS DO ANIMAL
                </div>

                <div class=" ">
                    Nome: <p class="ml-2 font-medium inline">{{$data[3]->nome}} </p>
                    Espécie: <p class="ml-2 font-medium inline">{{$data[3]->especie}} </p>
                    Raça: <p class="ml-2 font-medium inline">{{$data[10]->nome}}</p>
                </div>
                <div class=" ">
                    Sexo: <p class="ml-2 font-medium inline">{{$data[3]->sexo}} </p>
                    Idade(meses): <p class="ml-2 font-medium inline">{{$data[3]->idade}} </p>
                    Cor pelagem: <p class="ml-2 font-medium inline">{{$data[3]->cor_pelagem}} </p>
                </div>

                <div class=" ">

                    Porte: <p class="ml-2 font-medium inline">{{$data[3]->porte}} </p>
                    Número ident.: <p class="ml-2 font-medium inline">num ident</p>
                    Temperamento: <p class="ml-2 font-medium inline">{{$data[3]->temperamento}} </p>
                </div>

                <div class="">
                    Vacina raiva: <p class="font-medium inline">
                        {{$data[3]->vacinado_raiva == 1 ? 'Sim' : 'Não'}} -
                        {{$data[3]->vacinado_raiva == 1 ? \Carbon\Carbon::createFromFormat('Y-m-d', $data[3]->vacinado_raiva_data)->format('d/m/Y')  : ''}}
                    </p>
                    Vacinado polivalente: <p class="font-medium inline">
                        {{$data[3]->vacinado_polivalente == 1 ? 'Sim' : 'Não'}} -
                        {{$data[3]->vacinado_polivalente == 1 ? \Carbon\Carbon::createFromFormat('Y-m-d', $data[3]->vacinado_polivalente_data)->format('d/m/Y') : ''}}
                    </p>
                </div>
                <div class="">
                    Animal de rua: <p class="ml-2 font-medium inline">{{$data[3]->animal_rua == 1 ? 'Sim' : 'Não'}}
                    </p>
                    Animal de ONG: <p class="ml-2 font-medium inline">{{$data[3]->animal_ong == 1 ? 'Sim' : 'Não'}}</p>
                </div>
            </div>

            {{-- Dados da Socioeconomicos --}}
            @if ($data[8]->ong == null)


            <div class="mt-5">
                <div class="font-medium">
                    CONDIÇÃO SOCIOECONÔMICA DO PROPRIETÁRIO DO ANIMAL
                </div>

                <div class="inline ">
                    Renda familiar: <p class="ml-2 mr-4 font-medium inline">
                        {{number_format($data[4]->renda_familiar, 2) }} </p>
                    Número de pessoas no domicílio: <p class="ml-2 font-medium inline">
                        {{$data[4]->pessoas_em_domicilio}}
                    </p>
                </div>

                <div class=" ">
                    Participa de programa social ?: <p class="ml-2 font-medium inline">
                        {{$data[4]->participa_programa_social == 1 ? 'Sim' : 'Não'}}</p>
                    @if ($data[4]->participa_programa_social == 1)
                    @foreach ($data[4]->programas_sociais as $item)
                    {{$item}},
                    @endforeach
                    @endif

                </div>

                <div class=" ">
                    <div>
                        Número de animais em domicílio:
                    </div>
                    Cães:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_cachorro_total }}</p>
                    machos:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_cachorro_macho }} </p>
                    fêmeas:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_cachorro_femea }}</p>
                    Gatos:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_gato_total }}</p>
                    machos:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_gato_macho }}</p>
                    fêmeas:<p class="ml-2 font-medium inline"> {{$data[4]->quantidade_gato_femea }}</p>
                </div>





            </div>

            @endif

            {{-- Dados da Clínica --}}
            <div class="mt-5">
                <div class="font-medium">
                    CLÍNICA VETERINÁRIA
                </div>

                <div class="inline ">
                    Nome: <p class="ml-2 font-medium inline"> {{$data[5]->nome }}</p>
                    Telefone: <p class="ml-2 font-medium inline">{{$data[5]->telefone }}</p>
                </div>

                <div class=" ">
                    Endereço: <p class="ml-2 font-medium inline">{{$data[6]->endereco}}, {{$data[6]->numero}},
                        {{$data[6]->bairro}}</p>
                </div>


            </div>

            {{-- Assinaturas --}}
            <div class="text-center mt-7">
                ____________________________________________________________
                <div class="font-medium"> {{$data[0]->name}} </div>
                <div> Tutor ou Responsável</div>

            </div>
            <div class="text-center mt-2">
                ____________________________________________________________
                <div> Assinatura e carimbo do autorizador SMSA/SVS/UVCZ</div>
            </div>

            <div class="text-right mt-7">
                Esta guia é valida até <span class="font-bold">{{date('d/m/Y', strtotime('+30 days'))}}</span>
            </div>
        </div>
    </div>
</body>

</html>
