<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory,Sluggable;
    protected $table = "posts";
    protected $guarded = [] ;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category(){
        return $this->belongsTo(PostCategory::class , 'post_category_id' , 'id' );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
