<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="cuenta_bancarias"; 
    protected $primaryKey = 'id_cuenta';

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado','id_estado');    
    }
}
