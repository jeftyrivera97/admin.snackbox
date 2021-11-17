<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="clientes"; 
    protected $primaryKey = 'id_cliente'; 
    protected $fillable = ['id_cliente','codigo_cliente','nombre'];

    public function venta()
    {
        return $this->hasMany('App\Models\Venta');
    }
}
