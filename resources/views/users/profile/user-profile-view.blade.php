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
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="profile-cover bg-dark"></div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{ asset(Auth::guard('admin')->user()->profileImage) }}" class="rounded-circle shadow"
                            width="120" height="120" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <h4 class="mb-0">{{ $user->order->count() }}</h4>
                            <p class="mb-0 text-secondary">Total Orders</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="mb-0 text-secondary">Successfull Orders</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="mb-0 text-secondary">Expiry Orders</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{ $user->name }}</h4>
                        <h5 class="text-success">{{ $user->email }}</h5>
                        <p class="mb-0 text-secondary">{{ $user->stateList }},
                            {{ $user->country }}</p>
                        <div class="mt-4"></div>
                    </div>
                </div>

            </div>
        </div>
    </div><!--end row-->
</x-app-layout>
