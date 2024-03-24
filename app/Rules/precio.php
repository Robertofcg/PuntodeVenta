<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class precio implements Rule
{
    private $compra;
    private $venta;
    public function __construct($comp,$ven)
    {
        $this->compra=$comp;
        $this->venta=$ven;
    }
    public function passes($attribute, $value)
    {
        return $this->compra<$this->venta;
    }
    public function message()
    {
        return 'Precio de compra es mayor que el precio de venta';
    }
}
