<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Controllers\app\UploadController;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $post;


    public $title;
    public $thumbnail;
    public $post_category_id;
    public $body;

    public function mount(Post $post){
        $this->title = $post->title;
        $this->thumbnail = $post->thumbnail;
        $this->post_category_id = $post->post_category_id;
        $this->body = $post->body;
    }

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
        // 'thumbnail' => 'required|mimes:jpg,bmp,png | max:1024',
        'body' => 'required|string',
    ];

    public $thumbnail_new;
    public function updatePost(){

        $this->validate();
        if($this->thumbnail_new){
            $thumbnail_new_name = UploadController::post_thumbnail_upload($this->thumbnail_new);
        }

        $excerpt_len = strlen($this->body)/2 > 300 ? 300 : strlen($this->body);
        $this->post->update([
            'title' => $this->title,
            'thumbnail' => $this->thumbnail_new ? $thumbnail_new_name : $this->thumbnail,
            'user_id' => auth()->id(),
            'post_category_id' => $this->post_category_id,
            'excerpt' => substr($this->body, 0, $excerpt_len),
            'body' => $this->body,
        ]);

        return redirect(route('admin.posts.index'));
    }

    public function destroyPost($post_id){
        $post= Post::find($post_id);
        $post->delete();
        return redirect(route('admin.posts.index'));

    }

    public function render()
    {
        return view('livewire.admin.posts.edit',[
            'post_category_ids' => PostCategory::all()

        ]);
    }
}
