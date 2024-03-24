<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class inactivo implements Rule
{
    public $act;
    public function __construct($val)
    {
        $this->act=$val;
    }
    public function passes($attribute, $value)
    {
        return $this->act===1;
    }
    public function message()
    {
        return 'El usuario no esta activo, Contacte al administrador';
    }
}
