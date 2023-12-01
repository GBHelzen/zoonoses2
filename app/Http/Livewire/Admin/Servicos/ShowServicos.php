<?php

namespace App\Http\Livewire\Admin\Servicos;

use App\Events\AtendimentoServicoStatusEvent;
use App\Models\ClinicaVeterinaria;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Servico;
use App\Models\ServicoAtendimento;
use App\Rules\CheckStatusServicoAtendimento;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Notifications\NotificationUser;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ShowServicos extends Component
{

    use WithPagination;

    public $openModal = false;
    public $openModalContatar = false;
    public $openModalGuia = false;
    public $openModalCancelar = false;
    public $clinicas = [];

    protected $listeners = ['closeModal' => 'closeModal'];

    public $data_inicio, $data_fim, $temas, $presenca = false, $justificativa, $clinica_id;

    public Servico $servico;
    public ServicoAtendimento $atendimento;
    public Contato $contato;

    public $busca;
    public $codigo;
    public $status = '';
    public $de_data;
    public $ate_data;
    public $buscarPessoaFisica = 1;
    public $condicaoPessoa;
    public $bairro;
    public $local;
    private $validaClinica = false;

    public function rules()
    {

        if($this->openModal === true)
        return [
            'atendimento.data' =>
            $this->atendimento->codigo != null ?
                ['required', 'date', 'after_or_equal:' .  $this->atendimento->data]
                : ['required', 'date', 'after_or_equal:' .  now()->format('Y-m-d')],
            'atendimento.data_castracao' => ['nullable', 'date', 'before_or_equal:' .  now()->format('Y-m-d')],
            /*$this->atendimento->presenca == 1 ?
            ['required', 'date', 'after_or_equal:' .  now()->format('Y-m-d')] :
            ['nullable'],*/
            'servico.status' => [new CheckStatusServicoAtendimento($this->servico)],
            'atendimento.guia_entregue' =>
            $this->atendimento->presenca == 1 ?
            ['required'] : ['nullable'],
            'atendimento.executada' => ['nullable'],
            'atendimento.hora' => ['nullable',],
            'atendimento.temas' => ['required', 'string'],
            'atendimento.presenca' => ['nullable'],
            'atendimento.justificativa' => ['nullable'],
            'atendimento.clinica_id' => [$this->validaClinica ? 'required' : 'nullable',],
            'atendimento.pode_solicitar_guia' => ['nullable'],
            'atendimento.local_id' => ['required'],

            // 'atendimento.justificativa' =>
            // $this->atendimento->executada === 0 ?
            // ['required'] : ['nullable'],
            // 'atendimento.clinica_id' => $this->atendimento->presenca == 1 ? ['required'] : ['nullable'],
        ];

        if($this->openModalContatar === true)
        return [
            'contato.data_contato' => ['required', 'date', 'before_or_equal:' .  now()->format('Y-m-d')],
            'contato.servico_id' => ['required'],
            'contato.telefone_contatado' => ['required'],
            'contato.status' => ['required'],
            'contato.observacao' => ['nullable'],
        ];
    }


    public function messages()
    {
        return [
            'atendimento.data.after_or_equal' => 'A data informada deve ser igual ou maior que a data de hoje',
            'atendimento.data_castracao.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'contato.data_contato.before_or_equal' => 'A data informada deve ser igual ou anterior a data de hoje',
            'contato.telefone_contatado.required' => 'Informe o telefone contatado',
            'contato.status.required' => 'Informe o status do contato',

        ];
    }

    public function updatingBusca()
    {
        $this->resetPage();
    }
    public function updatingStatus()
    {
        $this->resetPage();
    }
    public function updatingDeData()
    {
        $this->resetPage();
    }
    public function updatingAteData()
    {
        $this->resetPage();
    }


    // Persiste um determinado atendimento salva ou edita

    public function storeServicoAntedimento()
    {
        $this->validaClinica = false;

        $this->validate();

        $this->atendimento->servico_id = $this->servico->id;

        $this->atendimento->save();

        event(new AtendimentoServicoStatusEvent($this->atendimento));

        $this->openModal = false;

    }

    // Persiste um determinado contato salva ou edita

    public function storeContato()
    {
        $this->contato->servico_id = $this->servico->id;
        $this->validate();
        $this->contato->save();

        return redirect()->to('/admin/dashboard');

        session()->flash('success', 'Contato salvo com sucesso!');

        $this->openModalContatar = false;


    }


    /**
     * Persiste o status do serviço para cancelado
     */
    public function storeStatusCancelado()
    {
        if ($this->servico->status == Servico::CANCELADO || $this->servico->status == Servico::CONFIRMADO) {
            $this->openModalCancelar = false;

            return session()->flash('error', 'Você não pode deletar um serviço que já foi atendido ou cancelado !');
        }

        $this->servico->status = Servico::CANCELADO;

        $this->servico->save();

        $this->openModalCancelar = false;

        $this->emit('servicoUpdated');

        session()->flash('success', 'Serviço alterado com sucesso !');
    }

    /**
     * Modal de atendimento
     */
    public function openModal(Servico $servico)
    {
        $this->servico = $servico;

        $this->atendimento = $servico->atendimento ?? new ServicoAtendimento();

        $this->atendimento->hora = $this->atendimento->getHoraAtendimento();

        $this->openModal = true;
    }


    /**
     * Modal de atendimento
     */
    public function openModalContatar(Servico $servico)
    {
        // dd($servico->ong.'-'.$servico->ong->telefone);
        $this->servico = $servico;
        if($servico->ong != null){
            if($servico->ong->telefone != null){
                $this->contato->telefone_contatado = $servico->ong->telefone;
            }else{
                $this->contato->telefone_contatado = $servico->ong->responsavel->telefone;
            }
        }else{
            $this->contato->telefone_contatado = $servico->pessoa->telefone;
        }

        $this->openModalContatar = true;
    }

    /**
     * Modal de preenchimento de presença e impressão da guia
     */
    public function openModalGuia(Servico $servico)
    {
        $this->servico = $servico;

        $this->atendimento = $servico->atendimento ?? new ServicoAtendimento();

        $this->clinica_id =  $servico->atendimento->clinica_id ?? null;

        $this->openModalGuia = true;
    }

    /**
     * Modal para setar o status do serviço como cancelado
     */
    public function openModalCancelar(Servico $servico)
    {
        $this->openModalCancelar = true;

        $this->servico = $servico;
    }

    /**
     * Responsável por imprimir a guia
     */
    public function imprimirGuia()
    {

        $this->servico->atendimento->clinica_id = $this->clinica_id;

        $this->servico->atendimento->save();

        $this->openModalGuia = false;

        session()->flash('success', 'A guia de serviço está sendo gerada !');

        return redirect()->route('imprimir-guia', ['servico' => $this->servico, 'clinica' => $this->clinica_id]);
    }


    public function mount()
    {
        $this->atendimento = new ServicoAtendimento();
        $this->clinicas = ClinicaVeterinaria::latest()->get();
        $this->servico = new Servico();
        $this->contato = new Contato();
    }

    public function render()
    {

        $busca = $this->busca;
        $codigo = $this->codigo;
        $status = $this->status;
        $from = $this->de_data;
        $to = $this->ate_data;
        $local = $this->local;
        $bairro = $this->bairro;
        $buscarPessoaFisica = $this->buscarPessoaFisica;
        $condicaoPessoa = $this->condicaoPessoa;


        $servico = Servico::when($buscarPessoaFisica == 1, function ($query) use ($busca) {
            $query->whereHas('pessoa', function ($query) use ($busca) {
                $query->whereHas('user', function ($query) use ($busca) {
                    $query->where('cpf', 'ilike',  '%' . $busca .  '%')->orWhere('name', 'ilike', '%' . $busca .  '%');
                });
            });
        })
        ->when($condicaoPessoa === 'BRE', function ($query) use ($condicaoPessoa) {
            $query->whereHas('pessoa', function ($query) use ($condicaoPessoa) {
                        $query->whereHas('dadosSocioEconomicos', function ($query) use ($condicaoPessoa) {
                            $query->where('renda_familiar', '<', 3636.01);
                });
            });
        })
        ->when($condicaoPessoa === 'CAD', function ($query) use ($condicaoPessoa) {
            $query->whereHas('pessoa', function ($query) use ($condicaoPessoa) {
                        $query->where('numero_cad_unico', '!=', null)->where('numero_cad_unico', '!=', '');
            });
        })
        ->when($condicaoPessoa === 'PRS', function ($query) use ($condicaoPessoa) {
            $query->whereHas('pessoa', function ($query) use ($condicaoPessoa) {
                        $query->whereHas('dadosSocioEconomicos', function ($query) use ($condicaoPessoa) {
                            $query->where('participa_programa_social', 1);
                });
            });
        })
        ->when($condicaoPessoa === 'POG', function ($query) use ($condicaoPessoa) {
            $query->whereHas('pessoa', function ($query) use ($condicaoPessoa) {
                 $query->where('numero_cad_unico', '=', '')->orWhereNull('numero_cad_unico');
                        $query->whereHas('dadosSocioEconomicos', function ($query) use ($condicaoPessoa) {
                            $query->where('participa_programa_social', 0)->where('renda_familiar', '>=', 3636.01);
                });
            });
        })
        ->when($buscarPessoaFisica == 0, function ($query) use ($busca) {

            $query->whereRaw('pessoa_id is null');

            $query->whereHas('ong', function ($query) use ($busca) {
                $query->where('nome_fantasia', 'ilike', '%' . $busca . '%')->orWhere('razao_social', 'ilike', '%' . $busca .  '%');

                $query->orWhereHas('responsavel', function ($query) use ($busca) {
                    $query->whereHas('user', function ($query) use ($busca) {
                        $query->where('cpf', 'ilike',  '%' . $busca .  '%')->orWhere('name', 'ilike', '%' . $busca .  '%');
                    });
                });
            });
        })
            ->when($this->codigo != null, function ($query) use ($codigo) {
                $query->whereHas('atendimento', function ($query) use ($codigo) {
                    $query->where('codigo',  'ilike', '%' . $codigo . '%');
                });
            })
            ->when($this->status != null, function ($query) use ($status) {
                $query->where('status', $status);
            })->when($this->local != null, function ($query) use ($local) {
                $query->whereHas('atendimento', function ($query) use ($local) {
                    $query->where('local_id', $local);
                });
            })->when($this->bairro != null, function ($query) use ($bairro) {
                $query->whereHas('pessoa', function ($query) use ($bairro) {
                    // $query->whereNotNull('local_id');
                           $query->whereHas('endereco', function ($query) use ($bairro) {
                            $query->where('bairro',  'ilike', '%' . $bairro . '%');
                   });
               });
            //     $query->whereHas('pessoa', function ($query) use ($bairro) {
            //         // $query->whereNotNull('endereco_id');
            //                $query->whereHas('endereco', function ($query) use ($bairro) {
            //                 $query->where('bairro',  'ilike', '%' . $bairro . '%');
            //        });
            //    });
                // $query->whereHas('endereco', function ($query) use ($bairro) {
                //     $query->where('bairro',  'ilike', '%' . $bairro . '%');
                // });
            })->when($this->de_data != null, function ($query) use ($from) {
                $query->whereHas('atendimento', function ($query) use ($from) {
                    $query->where('data', '>=', $from);
                });
            })->when($this->ate_data != null, function ($query) use ($to) {
                $query->whereHas('atendimento', function ($query) use ($to) {
                    $query->where('data', '<=', $to);
                });
            })

            ->latest('data_solicitacao')->paginate();

        return view(
            'admin.servicos.show-servicos',
            [
                // 'bairros' => Endereco::palestras()->get(),
                'enderecos' => Endereco::palestras()->get(),
                'servicos'  => $servico
            ]
        );
    }
}
