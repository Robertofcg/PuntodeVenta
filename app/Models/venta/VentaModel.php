<?php

namespace App\Models\venta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaModel extends Model
{
    use HasFactory;
    protected $table = 'venta' ;
    protected $primarykey = 'idVenta';
    public $timestamps = false;
    protected $fillable=['idVenta','idPersona','fecha_venta'];
}
 