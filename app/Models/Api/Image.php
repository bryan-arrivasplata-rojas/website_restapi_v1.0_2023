<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table ='image';
    public $timestamps =false;
    protected $primaryKey = 'idImage';
    
    protected $fillable = [
        'name',
        'url'
    ];
}
