<?php

namespace App\Services;

use App\Models\Ticket;
use App\Mail\TicketCreate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class TicketService 
{

    public function createTicket(array $data)
    {
        try {

            $data['reference'] = strtoupper(Str::random(10));

            $ticket = Ticket::create($data);

            Mail::to($ticket->email)->send(new TicketCreate($ticket));

            return $ticket;

        } catch (Exception $e) {
            Log::error("Ticket Creation Failed: " . $e->getMessage() . ' at Line ' . $e->getLine());
            throw $e;
        }
    }

    public function findReference(string $reference)
    {
        return Ticket::where('reference', $reference)->first();
    }

}
