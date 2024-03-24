<?php

namespace App\Models\empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadoModel extends Model
{
    use HasFactory;
    protected $table = 'persona' ;
    protected $primarykey = 'idPersona';
    public $timestamps = false;
    protected $fillable=['idPersona','nombre','apellidoP','apellidoM',
    'telefono','correo','password','activo','puesto'];
}
