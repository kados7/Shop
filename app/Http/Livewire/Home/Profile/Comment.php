<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\Comment as ModelsComment;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.home.profile.comment',[
            'comments' =>ModelsComment::where('user_id', auth()->id())->paginate(10)
        ]);
    }
}
