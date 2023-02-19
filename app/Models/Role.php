<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $guarded = [] ;

    public function permissions(){
        return $this->belongsToMany(Permission::class , 'permission_role');
    }
}
