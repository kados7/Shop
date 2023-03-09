<?php

namespace App\Http\Livewire\Admin\TicketPriority;

use App\Models\TicketPriority;
use Livewire\Component;

class Index extends Component
{
    public $ticket_priority_name;

    protected $rules=[
        'ticket_priority_name' => 'required'
    ];

    public function creatTicketPriority(){
        $this->validate();
        TicketPriority::create([
            'name' => $this->ticket_priority_name,
        ]);
    }

    public function distroyTicketPriority($ticket_priority_id){
        $ticket_priority = TicketPriority::find($ticket_priority_id);
        $ticket_priority->delete();
    }

    public function render()
    {
        return view('livewire.admin.ticket-priority.index',[
            'ticketPriorities' => TicketPriority::paginate(20),
        ]);
    }
}
