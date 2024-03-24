<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class nula implements Rule
{
    private $v;
    public function __construct($val)
    {
        $this->v=!empty($val);
    }
    public function passes($attribute, $value)
    {
        return $this->v;
    }
    public function message()
    {
        return 'No se encontraron productos';
    }
}
