<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketReply extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket, $reply;
    /**
     * Create a new message instance.
     */
    public function __construct($ticket, $reply)
    {
        $this->ticket = $ticket;
        $this->reply = $reply;
    }

    public function build() {
        return $this->subject('Ticket Reply')->view('emails.reply');
    }

}
