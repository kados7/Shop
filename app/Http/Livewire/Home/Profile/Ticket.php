<?php

namespace App\Http\Livewire\Home\Profile;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\Ticket as ModelsTicket;
use App\Models\TicketCategory;
use App\Models\TicketPriority;
use App\Notifications\Ticket\NewTicketNofitication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Illuminate\Support\Str;


class Ticket extends Component
{
    public $title;
    public $ticket_category_id;
    public $product_id;
    public $ticket_priority_id;
    public $body;

    protected $rules =[
        'title' => 'required|string',
        'ticket_category_id' => 'required',
        'product_id' => 'required',
        'ticket_priority_id' => 'required',
        'body' => 'required|string',
    ];

    public function store_new_ticket(){
        $this->validate();

        $new_ticket =ModelsTicket::create([
            'title' => $this->title,
            'slug' => Carbon::now()->dayOfYear . Str::random(10) . Carbon::now()->millisecond ,
            'body' => $this->body,
            'body_html' => $this->body,
            'product_id' => $this->product_id,
            'user_id' => auth()->id(),
            'ticket_category_id' => $this->ticket_category_id,
            'ticket_status_id' => 1,
            'ticket_priority_id' => $this->ticket_priority_id,
            'completed_at' => Carbon::now()
        ]);
        Notification::send(NewTicketNofitication::notificationRecievers($new_ticket->category->permission->ability) , new NewTicketNofitication($new_ticket));

    }
    public $search_term;
    public $haveSearch = false;
    // public $searchProducts;
    public function render()
    {
        return view('livewire.home.profile.ticket',[
            'tickets' => ModelsTicket::where('user_id',auth()->id())->paginate(20),
            'ticket_priorities' => TicketPriority::all(),
            'ticket_categories' => TicketCategory::all(),
            'products_search' => Product::all(),
        ]);
    }
}
