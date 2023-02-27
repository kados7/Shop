<?php

namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;

class Show extends Component
{

    public $post;

    public function render()
    {
        return view('livewire.admin.posts.show');
    }
}
