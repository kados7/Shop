<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.roles.index',[
            'roles' => Role::paginate(20),
        ]);
    }
}
