<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PassEquals implements Rule
{
    private $p1;
    private $value;
    public function __construct($p1,$value)
    {
        $this->p1=$p1;
        $this->value=$value;
    }
    public function passes($attribute, $value)
    {
        if (strcmp($this->value , $this->p1) === 0)//($value === $this->p1)
            return true;
        else
            return false;
    }
    public function message()
    {
        return "La contraseña no coincide intente otra vez";//'The validation error message.';
    }
}
