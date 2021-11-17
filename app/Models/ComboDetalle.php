<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboDetalle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="combo_detalles"; 
    protected $primaryKey = 'id';

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto','id_producto');    
    }
    public function combo()
    {
        return $this->belongsTo('App\Models\Combo','id_combo');    
    }

}
