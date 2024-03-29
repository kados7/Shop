<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Brand extends Model
{
    use HasFactory;
    use Sluggable ;
    protected $table = "brands";
    protected $guarded = [] ;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getIsActiveAttribute($is_active){
        return $is_active ? 'فعال' : 'غیر فعال' ;
    }

}
