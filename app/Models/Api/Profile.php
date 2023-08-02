<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table ='profile';
    public $timestamps =false;
    protected $primaryKey = 'idProfile';

    protected $fillable = [
        'description',
        'number',
        'birthday',
        'id',
        'name'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','id');
    }
}
