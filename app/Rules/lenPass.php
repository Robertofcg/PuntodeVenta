<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class lenPass implements Rule
{
    public function __construct()
    {

    }
    public function passes($attribute, $value)
    {
        return strlen($value)>5;
    }

    public function message()
    {
        return 'La contraseña debe ser mayor a 6 caracteres';
    }
}
