<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table ='file';
    public $timestamps =false;
    protected $primaryKey = 'idFile';
    
    protected $fillable = [
        'url',
        'name',
        'description',
        'position',
        'urlOptional',
        'idUserHost',
        'idUsability'
    ];
    public function usability(){
        return $this->hasOne(Usability::class,'idUsability','idUsability');
    }
    public function userhost(){
        return $this->hasOne(UserHost::class,'idUserHost','idUserHost');
    }
}