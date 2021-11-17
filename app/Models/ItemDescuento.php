<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDescuento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="item_descuentos"; 
    protected $primaryKey = 'id'; 

    public function item()
    {
        return $this->belongsTo('App\Models\Item','id_item');    
    }
    public function descuento()
    {
        return $this->belongsTo('App\Models\Descuento','id_descuento');    
    }
}
