<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table ='user';
    protected $fillable = [
        'email',
        'name',
        'password',
        'idRol'
    ];
    protected $hidden = [
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at'
    ];

    public function role(){
        return $this->hasOne(Role::class,'idRol','idRol');
    }

    public function userhost(){
        return $this->hasOne(UserHost::class);
    }
}
