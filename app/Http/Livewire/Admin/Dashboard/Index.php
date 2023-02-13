<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Comment;
use App\Models\Notification;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.index',[
            'unapprovedComments' => Comment::where('approved', 0)->paginate(6),
        ]);
    }
}
