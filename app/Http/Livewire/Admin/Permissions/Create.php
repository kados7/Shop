<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $ability;
    public $description;

    protected $rules =[
        'name' => 'required|string',
        'ability' => 'required|string',
        'description' => 'required|string',
    ];
    public function storePermission(){
        $this->validate();
        Permission::create([
            'name' => $this->name,
            'ability' => $this->ability,
            'description' => $this->description,
        ]);
        alert()->success('مجوز جدید با موفقیت اضافه شد');
        return redirect(route('admin.permissions.index'));
    }
    public function render()
    {
        return view('livewire.admin.permissions.create');
    }
}
