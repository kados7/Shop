<?php

namespace App\Http\Livewire\Admin\TicketCategory;

use App\Models\Permission;
use App\Models\TicketCategory;
use Livewire\Component;

class Index extends Component
{
    public $ticket_category_name;
    public $permission_id;

    protected $rules=[
        'ticket_category_name' => 'required',
        'permission_id' => 'required'
    ];

    public function creatTicketCategory(){
        $this->validate();
        TicketCategory::create([
            'name' => $this->ticket_category_name,
            'permission_id' => $this->permission_id,
        ]);
    }

    public function distroyTicketPriority($ticket_category_id){
        $ticket_category = TicketCategory::find($ticket_category_id);
        $ticket_category->delete();
    }
    public function render()
    {
        // dd(TicketCategory::paginate(20));
        return view('livewire.admin.ticket-category.index',[
            'ticket_categories' => TicketCategory::paginate(20),
            'permissions' => Permission::where('ability', 'like', '%'.'ticket'.'%')->get(),
        ]);
    }
}
