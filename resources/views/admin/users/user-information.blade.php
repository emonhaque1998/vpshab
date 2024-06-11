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
</x-app-layout>
