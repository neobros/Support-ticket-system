<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form class="mb-4 row g-2" id="search-form">
                        <div class="col-auto">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search by name">
                        </div>
                    </form>

                    <div id="ticket-table">
                        @include('agent.ticket-table', ['tickets' => $tickets])
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assest/agent/js/search.js') }}"></script>

</x-app-layout>