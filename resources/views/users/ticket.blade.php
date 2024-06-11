<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">My Ticket</h3>

        <div class="service_data mt-3 px-3">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($tickets)
                        @foreach ($tickets as $key => $ticket)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->status }}
                                </td>
                                <td>{{ $ticket->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ url("/view-ticket/$ticket->slug") }}"
                                        class="btn btn-success px-2 py-1"
                                        style="font-size: 12px">View</a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        {{-- {{ $orders->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
</x-user-layout>
