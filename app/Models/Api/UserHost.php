<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHost extends Model
{
    use HasFactory;
    protected $table ='userHost';
    public $timestamps =false;
    protected $primaryKey = 'idUserHost';
    
    protected $fillable = [
        'idHost',
        'id'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','id');
    }
    public function host(){
        return $this->hasOne(Host::class,'idHost','idHost');
    }
    public function file(){
        return $this->hasMany(File::class,'idUserHost','idUserHost');
    }
}
