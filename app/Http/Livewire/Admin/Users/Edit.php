<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $user;
    public $name;
    public $email;
    public $role;
    public $selected_permissions;

    public function mount(User $user){
        $this->name = $user->name;
        $this->email = $user->email;
        if(count($user->roles) > 0){
            $this->role = $user->roles->first()->id;
        }
        // $this->selected_permissions = $user->permissions->pluck('name', 'id');

    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
    ];

    public function UpdateUser($user_id){
        $this->validate();

        try {
            DB::beginTransaction();
            $user = User::findOrFail($user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $user->roles()->sync($this->role);
            // $user->syncPermissions($this->selected_permissions);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }
        alert()->success('کاربر با موفقیت ویرایش شد');
        return redirect(route('admin.users.index'));
    }

    public function render()
    {
        return view('livewire.admin.users.edit',[
            'roles' =>Role::all(),
            // 'permissions'=>Permission::all()
        ]);
    }
}
