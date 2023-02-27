<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Controllers\app\UploadController;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $thumbnail;
    public $post_category_id = 1;
    public $body;

    public $showNewCategoryDiv = false;
    public $new_category_name;

    public function storeCategory(){
        PostCategory::create([
            'name' => $this->new_category_name,
        ]);
        $this->showNewCategoryDiv = false;
    }

    protected $rules = [
        'title' => 'required|min:3',
        'post_category_id' => 'required|integer',
        'thumbnail' => 'required|mimes:jpg,bmp,png | max:1024',
        'body' => 'required|string',
    ];

    public function store_post(){

        $this->validate();
        if($this->thumbnail){
            $thumbnail_name = UploadController::post_thumbnail_upload($this->thumbnail);
        }

        $excerpt_len = strlen($this->body)/2 > 300 ? 300 : strlen($this->body);
        Post::create([
            'title' => $this->title,
            'thumbnail' => $thumbnail_name,
            'user_id' => auth()->id(),
            'post_category_id' => $this->post_category_id,
            'excerpt' => substr($this->body, 0, $excerpt_len),
            'body' => $this->body,
        ]);

        return redirect(route('admin.posts.index'));
    }

    public function render()
    {
        return view('livewire.admin.posts.create',[
            'post_category_ids' => PostCategory::all()
        ]);
    }
}
