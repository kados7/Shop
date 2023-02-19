<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $role;
    public $name;
    public $selected_permissions;

    public function mount(Role $role){
        $this->name = $role->name;
        $this->selected_permissions = $role->permissions->pluck('name' , 'id')->toArray();
    }

    protected $rules=[
        'name' => 'required'
    ];
    public function updateRole($role_id){
        // dd($this->selected_permissions);
        try {
            DB::beginTransaction();

            $role = Role::findOrFail($role_id);
            $role->update([
                'name' => $this->name,
            ]);

            $role->permissions()->detach();
            foreach($this->selected_permissions as $permission_id => $permission_name){
                if($permission_name){
                    $role->permissions()->attach(Permission::find($permission_id));
                }
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('نقش مورد نظر ویرایش شد');
        return redirect()->route('admin.roles.index');
    }

    public function render()
    {
        return view('livewire.admin.roles.edit',[
            'permissions'=> Permission::all(),
        ]);
    }
}
