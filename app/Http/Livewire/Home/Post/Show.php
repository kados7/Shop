<?php

namespace App\Http\Livewire\Home\Post;

use Livewire\Component;

class Show extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.home.post.show');
    }
}
