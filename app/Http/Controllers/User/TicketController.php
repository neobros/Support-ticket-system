<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\TicketCreate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
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
            
            $validated['reference'] = strtoupper(Str::random(10));
            $ticket = Ticket::create($validated);

            Mail::to($ticket->email)->send(new TicketCreate($ticket));
            
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

        $ticket = Ticket::where('reference', $request->reference)->first();

        if ($ticket) {
           return view('user.ticket.view', compact('ticket'));
        } else {
            return redirect()->back()->with('unsucces', 'Ticket not found with this reference number.');
        }

    }
}
