<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $selected_permissions;

    protected $rules=[
        'name' => 'required'
    ];

    public function createRole(){
        $this->validate();

        Role::create([
            'name' => $this->name,
        ]);

        alert()->success('نقش مورد نظر ایجاد شد');
        return redirect()->route('admin.roles.index');
    }
    public function render()
    {
        return view('livewire.admin.roles.create',[
            // 'permissions' => Permission::all(),
        ]);
    }
}
