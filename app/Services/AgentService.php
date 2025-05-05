<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Mail\TicketReply;
use Illuminate\Support\Facades\Mail;
use Exception;

class AgentService 
{

    public function getFilteredTickets(Request $request, int $perPage = 10)
    {
        $query = Ticket::query();

        if ($request->search != null) {
            $query->where('customer_name', 'like', '%' . $request->search . '%');
        }

        return $query->latest()->paginate($perPage);
    }

    public function getShowTickets($id)
    {
        $ticket = Ticket::find($id);
        $ticket->update(['is_viewed' => true]);
    
        return $ticket;
    }

    public function addReplyToTicket(int $ticketId, string $message)
    {
        $ticket = Ticket::find($ticketId);

        $reply = $ticket->replies()->create([
            'message' => $message,
            'is_agent' => true, 
        ]);

        Mail::to($ticket->email)->send(new TicketReply($ticket, $reply));

        return $reply;
    }

}
