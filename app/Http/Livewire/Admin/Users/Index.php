<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.users.index',[
            'users' => User::paginate(20),
        ]);
    }
}
