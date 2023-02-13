<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.permissions.index',[
            'permissions' => Permission::paginate(20),
        ]);
    }
}
