<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboCategoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="combo_categorias"; 
    protected $primaryKey = 'id';

   
}
