<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="role_user"; 

    public function rol()
    {
        return $this->belongsTo('App\Models\Role','role_id');    
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');    
    }
    
}
