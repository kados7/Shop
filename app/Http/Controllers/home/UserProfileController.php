<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Home\Profile\Ticket;
use App\Models\Ticket as ModelsTicket;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view('home.profiles.index');
    }

    public function comments(){
        return view('home.profiles.comments');
    }

    public function wishlist(){
        return view('home.profiles.wishlist');
    }

    public function address(){
        return view('home.profiles.address');
    }

    public function orders(){
        return view('home.profiles.orders');
    }

    public function ticket(){
        return view('home.profiles.tickets');
    }

    public function ticket_show(ModelsTicket $ticket){
        if($ticket->user_id == auth()->id(0)){
            return view('home.profiles.ticket_show',[
                'ticket'=> $ticket,
            ]);
        }
    }
}
