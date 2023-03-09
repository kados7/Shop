<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\TicketComment;
use App\Notifications\Ticket\NewTicketUserCommentNofitication;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class TicketShow extends Component
{
    protected $listeners = ['refreshComments' => '$refresh'];
    public $ticket;


    public $ticket_comment_body;

    protected $rules =[
        'ticket_comment_body' => 'required | string | min:10',

    ];
    public function store_ticket_comment(){
        $this->validate();
        $new_ticket_comment=TicketComment::create([
            'ticket_id' => $this->ticket->id,
            'user_id' => auth()->id(),
            'body' => $this->ticket_comment_body,
        ]);
        $this->emit('refreshComments');

        Notification::send(NewTicketUserCommentNofitication::notificationRecievers($this->ticket->category->permission->ability) , new NewTicketUserCommentNofitication($new_ticket_comment));

        // Ticket_status_change to => moshtari dar entezare pasokh
        $this->ticket->update([
            'ticket_status_id' => 3
        ]);
    }

    public function close_ticket(){
        // Ticket_status_change to => ticket closed
        $this->ticket->update([
            'ticket_status_id' => 5
        ]);
        $this->emit('refreshComments');

    }

    public function render()
    {
        return view('livewire.home.profile.ticket-show');
    }
}
