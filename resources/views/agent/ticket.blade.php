<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Ticket Details
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">

                    <h4 class="mb-3">Ticket Reference: <span class="text-primary">{{ $ticket->reference }}</span></h4>
                    <p class="mb-4 bg-light p-3 rounded">{{ $ticket->problem_description }}</p>

                    <form method="POST" action="/ticket/{{ $ticket->id }}/reply" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">Reply Message</label>
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Type your reply..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </form>


                    <div class="mt-5">
                        <h5 class="mb-3">Previous Replies</h5>

                            @forelse($ticket->replies as $reply)
                                <div class="border-start border-3 ps-3 mb-3 border-success">
                                    <div class="small text-muted">
                                        {{ $reply->created_at->format('d M Y h:i A') }} 
                                    </div>
                                    <p class="mb-0">{{ $reply->message }}</p>
                                </div>
                            @empty
                                <p class="text-muted">No replies yet.</p>
                            @endforelse
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


