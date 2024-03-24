<?php
namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
class noDecimal implements Rule
{
    public function __construct()
    {
    }
    public function passes($attribute, $value)
    {
        return is_int((int)$value);
    }
    public function message()
    {
        return 'Este campo solo acepta valores enteros';
    }
}
