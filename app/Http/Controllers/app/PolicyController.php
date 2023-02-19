<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public static function PermissionTo(User $user , $model ,$ability , $ability2){
        // dd($model);
        // dd(func_get_args());
        foreach ($user->roles as $role) {
            if($role->permissions->contains('ability', $ability)){
                return true;
            }
            elseif ($ability2 and $role->permissions->contains('ability', $ability2) and $model->user_id == $user->id) {
                return true;
            }
        }
        return false;
    }

    public static function PermissionToList(User $user,$ability){
        // dd(func_get_args());
        foreach ($user->roles as $role) {
            if($role->permissions->contains('ability', $ability)){
                return true;
            }
        }
        return false;
    }
}
