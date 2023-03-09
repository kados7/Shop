<?php

namespace App\Http\Livewire\Admin\TicketStatus;

use App\Models\TicketStatus;
use Livewire\Component;

class Index extends Component
{

    public $ticket_status_name;

    protected $rules=[
        'ticket_status_name' => 'required'
    ];

    public function creatTicketStatus(){
        $this->validate();
        TicketStatus::create([
            'name' => $this->ticket_status_name,
        ]);
    }

    public function distroyTicketPriority($ticket_status_id){
        $ticket_priority = TicketStatus::find($ticket_status_id);
        $ticket_priority->delete();
    }
    public function render()
    {
        return view('livewire.admin.ticket-status.index',[
            'ticket_statuses'=> TicketStatus::paginate(20),
        ]);
    }
}
