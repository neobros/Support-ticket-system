<?php

namespace App\Http\Controllers\Agent;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Mail\TicketReply;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::query();

        if ($request->search != null) {
            $query->where('customer_name', 'like', '%' . $request->search . '%');
        }
    
        $tickets = $query->latest()->paginate(10);
    
        if ($request->ajax()) {
            return view('agent.ticket-table', compact('tickets'))->render();
        }
    
        return view('agent.dashboard', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        $ticket->update(['is_viewed' => true]);

        return view('agent.ticket', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate(
            ['message' => 'required']
        );

        $ticket = Ticket::find($id);
        $reply = $ticket->replies()->create(['message' => $request->message]);

        Mail::to($ticket->email)->send(new TicketReply($ticket, $reply));
        
        return back()->with('status', 'Reply sent!');
    }
}
