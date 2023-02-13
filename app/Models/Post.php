<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $guarded = [] ;

    public function category(){
        return $this->belongsTo(PostCategory::class , 'post_category_id' , 'id' );
    }
}
