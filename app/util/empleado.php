<?php
namespace App\util;
class Empleado
{
    private $llave;
    private $name;

    public function __construct($id,$nombre)
    {
        $this->llave=$id;
        $this->name=$nombre;

    }
    public function getNombre()
    {
        return $this->name;
    }
    public function getId()
    {
        return $this->llave;
    }
}
?>
