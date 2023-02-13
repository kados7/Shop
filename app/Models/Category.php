<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $guarded = [] ;

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function parent(){
        return $this->belongsTo(Category::class , 'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function getIsActiveAttribute($is_active){
        return $is_active ? 'فعال' : 'غیر فعال' ;
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('is_filter', 'is_variation');
    }

}
