<?php

namespace App\Http\Livewire\Admin\Tickets;

use App\Models\Ticket;
use App\Models\TicketComment;
use App\Notifications\Ticket\NewTicketCommentNofitication;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['refreshComments' => '$refresh'];
    public $ticket;


    public $ticket_comment_body;

    protected $rules =[
        'ticket_comment_body' => 'required | string | min:10',

    ];
    public function store_ticket_comment(){
        $this->validate();
        $new_ticket_comment =TicketComment::create([
            'ticket_id' => $this->ticket->id,
            'user_id' => auth()->id(),
            'body' => $this->ticket_comment_body,
        ]);
        $this->emit('refreshComments');
        Notification::send(NewTicketCommentNofitication::notificationRecievers($this->ticket->user) , new NewTicketCommentNofitication($new_ticket_comment));

        // Ticket_status_change to => Pasokh dade shode
        $this->ticket->update([
            'ticket_status_id' => 2
        ]);
    }

    public function render()
    {
        return view('livewire.admin.tickets.show');
    }
}
