<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CPF implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if (!empty($value)) {
            return $this->isValid($value);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este CPF parece inválido!';
    }

    private function isValid($value)
    {
        if (empty($value)) {
            return false;
        }
        $valid = true;
        $cpf = str_pad(preg_replace('/[^0-9_]/', '', $value), 11, '0', STR_PAD_LEFT);
        for ($x = 0; $x < 10; $x++) {
            if ($cpf == str_repeat($x, 11)) {
                $valid = false;
            }
        }
        if ($valid) {
            if (strlen($cpf) != 11) {
                $valid = false;
            } else {
                for ($t = 9; $t < 11; $t++) {
                    $d = 0;
                    for ($c = 0; $c < $t; $c++) {
                        $d += $cpf[
                        $c] * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($cpf[
                    $c] != $d) {
                        $valid = false;
                        break;
                    }
                }
            }
        }
        return $valid;
    }
}
