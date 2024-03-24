<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class dosDecimal implements Rule
{
    public function __construct()
    {

    }
    public function passes($attribute, $value)
    {
        return "".number_format($value,2)== $value;
    }
    public function message()
    {
        return 'Este campo solo acepta 2 decimales';
    }
}
