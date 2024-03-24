<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class login implements Rule
{
    private $val;
    public function __construct($p1)
    {
        $this->val=$p1;
    }
    public function passes($attribute, $value)
    {
        return $this->val == 1;
    }
    public function message()
    {
        return 'Usuario o contraseña incorrecto';
    }
}
