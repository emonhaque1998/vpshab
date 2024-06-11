@php
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <div id="cover-spin"></div>
    <!--breadcrumb-->

    <div class="page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3 text-white">Pages</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-light">Settings</button>
                <button type="button" class="btn btn-light split-bg-light dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> 
                    <a class="dropdown-item"
                        href="javascript:;">Give Invoice</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="profile-cover bg-dark"></div>

    <div class="row">
        
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{ asset(Auth::guard('admin')->user()->profileImage) }}" class="rounded-circle shadow"
                            width="120" height="120" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <h4 class="mb-0">{{ $order->where("status", "Successfull")->count() }}</h4>
                            <p class="mb-0 text-secondary">Success Order</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">{{ $order->where("status", "Processing")->count() }}</h4>
                            <p class="mb-0 text-secondary">Processing Order</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">{{ $order->where("status", "Pending")->count() }}</h4>
                            <p class="mb-0 text-secondary">Pending Order</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">{{ $order->where("status", "Expire")->count() }}</h4>
                            <p class="mb-0 text-secondary">Expire Order</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <p class="mb-0 text-secondary">{{ $user->email }}</p>
                        <div class="mt-4"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div><!--end row-->
    <div class="col-12 col-lg-12 d-flex">
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
                                </tr>
                            @endforeach
                           @endisset
                        </tbody>
                    </table>
                </div>
                {{-- {{ $orders->links('vendor.pagination.default') }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
