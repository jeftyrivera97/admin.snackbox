<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDeposito extends Model
{
    use HasFactory;

    protected $table="pedido_depositos"; 
    protected $primaryKey = 'id'; 
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido','id_pedido');    
    }

    public function cuenta()
    {
        return $this->belongsTo('App\Models\CuentaBancaria','id_cuenta');    
    }
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad;','id_ciudad');    
    }
}
