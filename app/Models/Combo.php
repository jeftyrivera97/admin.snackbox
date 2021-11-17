<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;
    protected $table="combos";
    public $timestamps = false; 
    protected $primaryKey = 'id_combo'; 
    protected $fillable = ['id_combo','descripcion','nombre'];


    public function estado()
    {
        return $this->belongsTo('App\Models\Estado','id_estado');    
    }
}
