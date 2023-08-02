<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    use HasFactory;
    protected $table ='host';
    public $timestamps =false;
    protected $primaryKey = 'idHost';
    
    protected $fillable = [
        'url'
    ];
    public function userhost(){
        return $this->hasOne(UserHost::class);
    }
}
