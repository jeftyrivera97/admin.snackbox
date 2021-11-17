<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;
    protected $table="pedido_detalles"; 
    protected $primaryKey = 'id'; 
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido','id_pedido');    
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item','id_item');    
    }
}
