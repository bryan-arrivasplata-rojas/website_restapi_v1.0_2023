<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usability extends Model
{
    use HasFactory;
    protected $table ='usability';
    public $timestamps =false;
    protected $primaryKey = 'idUsability';
    
    protected $fillable = [
        'name'
    ];
}
