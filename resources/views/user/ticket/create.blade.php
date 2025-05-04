@extends('user.layout')
@section('content')
    <div class="background">
        <div class="ticket-section">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <h2>Ticket Management System</h2>

                <input type="text" name="customer_name" placeholder="Name" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="number" name="phone" placeholder="phone" required><br>
                <textarea name="problem_description" placeholder="Describe the issue" required></textarea>

                <input type="submit" value="Create Ticket">
                
            </form>

            <button class="view-history-btn" onclick="window.location='{{ route('checkStatus') }}' ">Check Ticket Details</button>

        </div>
    </div>
     
    @if(session('reference'))
        <script>
            Swal.fire({
                title: "Ticket Created. Ref:",
                text: "{{ session('reference') }}",
                icon: "success"
            });
        </script>
    @endif

@endsection
