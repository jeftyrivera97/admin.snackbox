<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="categorias"; 
    protected $primaryKey = 'id_categoria'; 

    public function tipoCategoria()
    {
        return $this->belongsTo('App\Models\TipoCategoria','id_tipo');    
    }
}
