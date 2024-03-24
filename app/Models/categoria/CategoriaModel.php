<?php

namespace App\Models\categoria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    use HasFactory;
    protected $table = 'categoria' ;
    protected $primarykey = 'codigo';
    public $timestamps = false;
    protected $fillable=['codigo','nombreCat'];
}
