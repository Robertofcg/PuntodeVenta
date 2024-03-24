<?php

namespace App\Models\venta;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVentaModel extends Model
{
    use HasFactory;
    protected $table = 'venta' ;
    protected $primarykey = 'idDetalle';
    public $timestamps = false;
    protected $fillable=['codigo','cantidad','idVenta','monto'];
}
