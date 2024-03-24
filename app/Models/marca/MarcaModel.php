<?php

namespace App\Models\marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarcaModel extends Model
{
    use HasFactory;
    protected $table = 'marca' ;
    protected $primarykey = 'idMarca';
    public $timestamps = false;
    protected $fillable=['idMarca','nombre'];
}
