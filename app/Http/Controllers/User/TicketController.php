<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\TicketService;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function create()
    {
        return view('user.ticket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'problem_description' => 'required|max:500',
        ]);

        try {

            $ticket = $this->ticketService->createTicket($validated);
            
            return redirect('/')->with('reference', $ticket->reference);

        } catch (Exception $e) {
            Log::error("Error Occurred: " . $e->getMessage() . ' at Line ' . $e->getLine());
            return redirect()->back()->with('unsucces', 'An unexpected error occurred. Please try again.');
        }
    }

    public function checkStatus()
    {
        return view('user.ticket.status');
    }

    public function viewStatus(Request $request)
    {
        $request->validate([
            'reference' => 'required'
        ]);

        $ticket = $this->ticketService->findReference($request->reference);

        if ($ticket) {
           return view('user.ticket.view', compact('ticket'));
        } else {
            return redirect()->back()->with('unsucces', 'Ticket not found with this reference number.');
        }

    }
}
