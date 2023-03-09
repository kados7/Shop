<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory;
    protected $table = "permissions";
    protected $guarded = [] ;

    public function getColor(){
        $first_character = $this->ability[0];
        $integerToUse = ord(strtolower($first_character)) - 96;
        $color = '' ;

        if($integerToUse == 2){
            $color = 'red';
        }
        elseif($integerToUse == 3){
            $color = 'green';
        }
        elseif($integerToUse >= 3 and $integerToUse < 10 ){
            $color = 'blue';
        }
        elseif($integerToUse >= 10 and $integerToUse < 18 ){
            $color = 'blueviolet';
        }
        elseif($integerToUse >= 18 and $integerToUse <= 20 ){
            $color = 'firebrick';
        }
        return $color;
    }

    public function roles(){
        return $this->belongsToMany(Role::class , 'permission_role');
    }
}
