<?php

namespace App\Http\Livewire\Admin\TicketPriority;

use Livewire\Component;

class Edit extends Component
{
    public $ticketPriority;
    public $name;

    // public function mount($ticketPriority){
    //     $this->name = $ticketPriority->name;
    // }

    public function render()
    {
        return view('livewire.admin.ticket-priority.edit');
    }
}
