@inject('carbon', 'Carbon\Carbon')
<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">My Service</h3>

        <div class="service_data mt-3 px-3">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">IP Address</th>
                        <th scope="col">Service</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                        {{-- <th scope="col" class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @isset($orders)
                        @foreach ($orders as $order)
                            @isset($order->product)
                                <tr>
                                    <td>{{ $order->ipAddress ?? 'Wating' }}
                                        @if($order->status === "Expire" && $order->invoice->status === "Paid")
                                            <span class="badge bg-danger">Offline</span>
                                        @else
                                            @if ($order->api_status === "offline")
                                                <span class="badge bg-danger">{{ $order->api_status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $order->api_status }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $order->product->title }}</td>
                                    @php
                                        $date2 = $carbon::parse($order->dueDate);
                                    @endphp
                                    @if (now()->diffInDays($date2) <= 3)
                                        <td class="text-danger">
                                            {{ now()->diffInDays($date2) }}
                                            Days
                                        </td>
                                    @else
                                        <td class="text-light">
                                            {{ now()->diffInDays($date2) }}
                                            Days
                                        </td>
                                    @endif
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        @isset($order->api_status)
                                            @if($order->api_status != "error" &&  $order->status != "Expire")
                                                @if ($order->api_status === "offline")
                                                    <a class="btn btn-success py-0 px-2" href="{{ url("service-boot/$order->id") }}">Boot</a> | <a class="btn btn-success py-0 px-2" href="">Restart</a></td>
                                                @else
                                                    <a class="btn btn-success py-0 px-2" href="{{ url("service-shutdown/$order->id") }}">off</a> | <a class="btn btn-success py-0 px-2" href="">Restart</a>
                                                @endif
                                            @endif
                                        @endisset
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        {{ $orders->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-user-layout>
