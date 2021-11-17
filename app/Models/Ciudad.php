<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="ciudades"; 
    protected $primaryKey = 'id'; 
  
    public function estado()
    {
        return $this->belongsTo('App\Models\Estado','id_estado');    
    }
}
