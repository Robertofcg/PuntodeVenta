<?php

namespace App\Models\Proveedor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedorModel extends Model
{
    use HasFactory;
    protected $table = 'proveedor' ;
    protected $primarykey = 'proveedor';
    public $timestamps = false;
    protected $fillable=['proveedor','nombre','telefono','correo',
    'direccion'];
}