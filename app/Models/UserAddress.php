<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = "user_addresses";
    protected $guarded = [] ;

    public function province(){
        return $this->belongsTo(ProvinceCities::class , 'province_id' ,'id');
    }
    public function city(){
        return $this->belongsTo(ProvinceCities::class , 'city_id' ,'id');
    }
}
