@inject('carbon', 'Carbon\Carbon')
<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">My Invoice</h3>

        <div class="service_data mt-3 px-3">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($invoices)
                        @foreach ($invoices as $invoice)
                            @isset($invoice->product)
                                <tr>
                                    <td>{{ $invoice->orderId }}</td>
                                    @php
                                        $date2 = $carbon::parse($invoice->dueDate);
                                    @endphp
                                    <td>{{ $invoice->created_at->format('d-m-Y') }}
                                    </td>
                                    <td>{{ $date2->format('d-m-Y') }}</td>
                                    <td>{{ $invoice->product->currency }}{{ $invoice->totalAmount }}</td>
                                    <td class="text-left"><a href="{{ url("/my-invoice/$invoice->id") }}"
                                            class="btn btn-success px-2 py-1"
                                            style="font-size: 12px">{{ $invoice->status }}</a>
                                        @if ($invoice->created_at->diffInDays($carbon::parse($invoice->created_at)->addDays(30)) <= 3)
                                            <a href="" class="btn btn-success px-2 py-1"
                                                style="font-size: 12px">Renew</a>
                                        @endif

                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        {{ $invoices->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-user-layout>
