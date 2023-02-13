<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $table = "attributes";
    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class)->withPivot('is_filter', 'is_variation');
    }

    public function filter_attribute_values(){
        return $this->hasMany(ProductAttribute::class)->select('attribute_id','value')->distinct();
    }
    public function variation_attribute_values(){
        return $this->hasMany(ProductVariation::class)->select('attribute_id','value')->distinct();
    }
}
