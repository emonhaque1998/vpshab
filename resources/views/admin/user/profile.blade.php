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
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-0">My Account</h5>
                    <hr>
                    <div class="card shadow-none border">
                        <div class="card-header">
                            <h6 class="mb-0">USER INFORMATION</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" id="profileSubmitForm">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ Auth::guard('admin')->user()->name }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ Auth::guard('admin')->user()->address }}" placeholder="Address">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Country</label>
                                    <select name="country" id="countryList" class="form-control">
                                        @isset($countries)
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['code3'] }}"
                                                    {{ Auth::guard('admin')->user()->country === $country['code3'] ? 'selected' : null }}>
                                                    {{ $country['name'] }}</option>
                                            @endforeach
                                        @endisset

                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">City</label>
                                    <select name="stateName" id="stateList" class="form-control">
                                        <option value="{{ Auth::guard('admin')->user()->stateName }}">
                                            {{ Auth::guard('admin')->user()->stateName }}</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" name="zipcode"
                                        value="{{ Auth::guard('admin')->user()->zipcode }}">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control"
                                        value="{{ Auth::guard('admin')->user()->designation }}" name="designation">
                                </div>
                                <div class="text-start">
                                    <x-submit btnId="profile_submit_btn" btnText="Save Changes" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="{{ asset(Auth::guard('admin')->user()->profileImage) }}" class="rounded-circle shadow"
                            width="120" height="120" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                        <div class="text-center">
                            <h4 class="mb-0">45</h4>
                            <p class="mb-0 text-secondary">Friends</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="mb-0 text-secondary">Photos</p>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="mb-0 text-secondary">Comments</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="mb-1">{{ Auth::guard('admin')->user()->name }}, 27</h4>
                        <p class="mb-0 text-secondary">{{ Auth::guard('admin')->user()->stateName }},
                            {{ Auth::guard('admin')->user()->country }}</p>
                        <div class="mt-4"></div>
                        <h6 class="mb-1">HR Manager - Codervent Technology</h6>
                        <p class="mb-0 text-secondary">University of Information Technology</p>
                    </div>
                    <hr>
                    <div class="text-start">
                        <h5 class="">About</h5>
                        <p class="mb-0">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using Lorem.
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                        Followers
                        <span class="badge bg-primary rounded-pill">95</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Following
                        <span class="badge bg-primary rounded-pill">75</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                        Templates
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--end row-->
</x-app-layout>
