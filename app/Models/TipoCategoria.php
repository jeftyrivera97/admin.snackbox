<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="tipo_categorias"; 
    protected $primaryKey = 'id_tipo'; 
}
