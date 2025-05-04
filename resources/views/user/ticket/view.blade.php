@extends('user.layout')
@section('content')

<div class="background-view">
    <div class="ticket-section">
        <h3 class="ticket-title">Ticket Reference: {{ $ticket->reference }}</h3>
        <p class="ticket-description">{{ $ticket->problem_description }}</p>
        <div class="replies">
            @foreach($ticket->replies as $reply)
                <div class="reply agent-reply">
                    <div class="reply-header">
                        <strong>Agent  - </strong> &nbsp;&nbsp;
                        <span class="reply-time">{{ $reply->created_at->format('d M Y h:i A') }}</span>
                    </div>
                    <p>{{ $reply->message }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
