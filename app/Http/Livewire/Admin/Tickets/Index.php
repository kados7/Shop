<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
use Livewire\Component;

class Index extends Component
{
    public $user_permissions=[];

    public function render()
    {
        auth()->user()->roles->each(function($role){
            $role->permissions->each(function($permission){
                if(str_contains($permission->ability,'ticket-answer')){
                    array_push($this->user_permissions , $permission->id);
                }
            });
        });

        $ticket_for_each_admin=Ticket::with('category')->whereHas('category', fn ($query) =>
            $query->whereIn('permission_id', $this->user_permissions)
        )->paginate(20);
        // dd($ticket_for_each_admin);
        return view('livewire.admin.tickets.index',[
            'tickets' => $ticket_for_each_admin,
        ]);

    }
}
