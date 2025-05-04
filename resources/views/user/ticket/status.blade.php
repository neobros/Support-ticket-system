@extends('user.layout')
@section('content')
    <div class="background">
        <div class="ticket-section">
            <form method="POST" action="{{ route('checkStatus') }}">
                @csrf
                <h2>Ticket Check Status</h2>
                <input type="text" name="reference" placeholder="Ticket Ref" required><br>
                <input type="submit" value="Check Status">

            </form>

            <button class="view-history-btn" onclick="window.location='{{ route('/') }}' ">Back</button>
        </div>
    </div>

@endsection
