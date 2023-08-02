<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table ='role';
    public $timestamps =false;
    protected $primaryKey = 'idRol';
    
    protected $fillable = [
        'description'
    ];
    
}
