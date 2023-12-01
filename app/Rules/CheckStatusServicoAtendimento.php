<?php

namespace App\Rules;

use App\Models\Servico;
use App\Models\ServicoAtendimento;
use Illuminate\Contracts\Validation\Rule;

class CheckStatusServicoAtendimento implements Rule
{

    protected $servico = null;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Servico $servico)
    {
        // dd($servico);
        $this->servico = $servico;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $statuses = [Servico::CANCELADO, Servico::CONFIRMADO];

        if (in_array($this->servico->status, $statuses))
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Você não pode alterar um serviço que já foi atendido ou cancelado !';
    }
}
