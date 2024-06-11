<x-user-layout>
    @include('users.dashboard.left-side')

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">My Profile</h3>
        <div class="container my-5">
            <div class="row text-light">
                <div class="col-md-5">
                    <div class="card bg-transparent shadow">
                        <img src="{{ asset("assets/img/avater.png") }}"
                            class="card-img-top" alt="Profile Picture">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->name ?? '' }}</h5>
                        </div>
                        <ul class="list-group list-group-flush" style="font-size: 14px">
                            <li class="list-group-item text-light bg-transparent">Email: {{ Auth::user()->email }}</li>
                            <li class="list-group-item bg-transparent text-light">Location:
                                {{ Auth::user()->stateList }}{{ Auth::user()->stateList ? ',' : null }}
                                {{ Auth::user()->country }}
                            </li>
                            <li class="list-group-item bg-transparent text-light">Joined:
                                {{ Auth::user()->created_at->format('d-m-Y') }}
                            </li>
                        </ul>
                        <div class="card-body" style="font-size: 12px">
                            <a href="{{ route('account-setting.index') }}" class="card-link">Edit Profile</a>
                            <a href="{{ route('change-password.index') }}" class="card-link">Change Password</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card mt-3 bg-transparent shadow">
                        <div class="card-body bg-transparent">
                            <h5 class="card-title bg-transparent">Overview</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent text-light">Total Service <span
                                        class="badge badge-primary bg-danger">{{ Auth::user()->order()->count() }}</span>
                                </li>
                                <li class="list-group-item bg-transparent text-light">Successfull Service <span
                                        class="badge badge-primary bg-danger">{{ Auth::user()->order()->where("status", "Successfull")->count() }}</span>
                                </li>
                                <li class="list-group-item bg-transparent text-light">Pending Service <span
                                        class="badge badge-primary bg-danger">{{ Auth::user()->order()->where("status", "Pending")->count() }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-3 bg-transparent shadow">
                        <div class="card-body bg-transparent">
                            <h5 class="card-title bg-transparent">My Fund</h5>
                            <ul class="list-group list-group-flush row">
                                <li class="list-group-item bg-transparent text-light text-center">Total Amount:

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
