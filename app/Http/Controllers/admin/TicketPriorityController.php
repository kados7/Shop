<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny' , Ticket::class);

        return view('admin.ticket-priorities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function show(TicketPriority $ticketPriority)
    {
        dd($ticketPriority);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketPriority $ticketPriority)
    {
        dd($ticketPriority);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketPriority $ticketPriority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketPriority $ticketPriority)
    {
        //
    }
}
