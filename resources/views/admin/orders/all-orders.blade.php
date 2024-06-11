@php
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="All Orders" />
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-lg-9 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Ip</th>
                                    <th>Customer name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @isset($orders)
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->ipAddress ? $order->ipAddress : 'Not Given' }}</td>
                                        <td>{{ $order->name ?? '' }}</td>
                                        <td>{{ $order->product->currency ??  "" }} {{ $order->product->monthly_price ?? "Not Found" }}</td>
                                        <td><span class="badge rounded-pill bg-danger">{{ $order->status }}</span></td>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td>{{ Carbon::parse($order->dueDate)->format('d-m-Y') }}</td>
                                        <td>
                                            @isset($order)
                                                @if($order->status === "Successfull" || $order->status === "Processing")
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="{{ url('admin/orders/all-orders/' . $order->id) }}"
                                                            class="text-primary" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="View detail" aria-label="Views"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                    </div>
                                                @endif
                                            @endisset
                                        </td>
                                    </tr>
                                @endforeach
                               @endisset
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 d-flex">
            <div class="card w-100">
                <div class="card-header py-3">
                    <h5 class="mb-0">Filter by</h5>
                    <a href="{{ route('all-orders.index') }}" class="btn btn-primary py-1 px-2 mt-2" style="font-size: 14px">Reset Search</a>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route("all-orders.index") }}" method="GET">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Order ID</label>
                            <input type="text" value="{{ old('orderId') }}" name="orderId" class="form-control" placeholder="Order ID">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ip Address</label>
                            <input type="text" name="ipAddress" class="form-control" placeholder="Ip Adress">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Customer</label>
                            <input type="text" class="form-control" placeholder="Customer name" name="name">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Order Status</label>
                            <select class="form-select" name="status">
                                <option value="All">All</option>
                                <option value="Pending">Pending</option>
                                <option value="Processing">Processing</option>
                                <option value="Successfull">Successfull</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Date Added</label>
                            <input type="date" class="form-control" name="created_at">
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Filter Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--end row-->
</x-app-layout>
