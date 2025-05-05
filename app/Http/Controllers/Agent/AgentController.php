<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AgentService;

class AgentController extends Controller
{
    public function __construct(AgentService $agentService)
    {
        $this->agentService = $agentService;
    }

    public function index(Request $request)
    {
        $tickets = $this->agentService->getFilteredTickets($request);
    
        if ($request->ajax()) {
            return view('agent.ticket-table', compact('tickets'))->render();
        }
    
        return view('agent.dashboard', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = $this->agentService->getShowTickets($id);
        $ticket->update(['is_viewed' => true]);

        return view('agent.ticket', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate(
            ['message' => 'required']
        );

        $this->agentService->addReplyToTicket($id, $request->message);

        return back()->with('status', 'Reply sent!');
    }
}
