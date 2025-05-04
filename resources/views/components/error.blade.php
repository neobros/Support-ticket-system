@if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "{{ session('success') }}",
        });
    </script>
    @endif

    @if (session('unsucces'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('unsucces') }}",
        });
    </script>
    @endif

    @if ($errors->any())
    <script>
        let errorMessages = @json($errors -> all());
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: errorMessages.join("<br>"),
        });
    </script>
@endif