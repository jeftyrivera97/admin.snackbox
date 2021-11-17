<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoVenta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="estado_ventas"; 
    protected $primaryKey = 'id_estado'; 
}
