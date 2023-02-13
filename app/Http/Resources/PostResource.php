<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public static $wrap = 'post';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            // 'category_id' => $this->category_id,
            'title' => strtoupper($this->title),
            'thumbnail' => $this->thumbnail,
            // 'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            // 'category' => $this->whenLoaded('category'),
            'category' => (Post::findOrFail($this->id))->category,
        ];
    }

    public function with($request){
        return [
            'category' => 'sss' ,
        ];
    }
}
