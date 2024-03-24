<?php

namespace App\Models\producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;
    protected $table = 'producto' ;
    protected $primarykey = 'codigo';
    public $timestamps = false;
    protected $fillable=['codigo','proveedor','descripcion','idMarca','modelo','nombre_producto',
    'precio_unitario','stock','precio_compra','Categoria'];
}
