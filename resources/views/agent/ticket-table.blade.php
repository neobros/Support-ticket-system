<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Reference</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $key => $ticket)
                <tr>
                    <td>{{ ++$key  }}</td>
                    <td>{{ $ticket->customer_name }}</td>
                    <td>{{ $ticket->reference }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>
                        <span class="badge {{ $ticket->is_viewed ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $ticket->is_viewed ? 'Viewed' : 'New' }}
                        </span>
                    </td>
                    <td>
                        <a href="/ticket/{{ $ticket->id }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td r colspan="10" class="px-6 py-4 text-center text-gray-500 h-[400px]">
                        No Tickets found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<div class="mt-3">
    {!! $tickets->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
