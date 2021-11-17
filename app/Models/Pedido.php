<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table="pedidos"; 
    protected $primaryKey = 'id_pedido'; 
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Models\EstadoPedido','id_estado');    
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente','id_cliente');    
    }
}

