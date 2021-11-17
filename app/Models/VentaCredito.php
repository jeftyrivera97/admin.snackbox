<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaCredito extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="venta_creditos"; 
    protected $primaryKey = 'id'; 

    public function venta()
    {
        return $this->belongsTo('App\Models\Venta','id_venta');    
    }
  
}
