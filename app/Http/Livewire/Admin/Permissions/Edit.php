<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use Livewire\Component;

class Edit extends Component
{
    public $permission;
    public $name;
    public $ability;
    public $description;

    public function mount(Permission $permission){
        $this->name = $permission->name;
        $this->ability = $permission->ability;
        $this->description = $permission->description;
    }

    protected $rules =[
        'name' => 'required|string',
        'ability' => 'required|string'
    ];
    public function updatePermission($permission_id){
        $this->validate();

        $permission = Permission::findOrFail($permission_id);
        $permission->update([
            'name' => $this->name,
            'ability' => $this->ability,
            'description' => $this->description,
        ]);
        alert()->success('مجوز با موفقیت ویرایش شد');
        return redirect(route('admin.permissions.index'));
    }
    public function render()
    {
        return view('livewire.admin.permissions.edit');
    }
}
