<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="catalogos"; 
    protected $primaryKey = 'id_catalogo'; 
}
