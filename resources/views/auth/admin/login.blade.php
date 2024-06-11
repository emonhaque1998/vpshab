<x-admin-guest>
    <!--start content-->
    <main class="authentication-content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4 mx-auto">
                    <div class="card shadow rounded-5 overflow-hidden">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title">Sign In</h5>
                            <p class="card-text mb-5">See your growth and get consulting support!</p>
                            <form class="form-body" action="{{ route('admin.login') }}" method="POST">
                                @csrf
                                <div class="d-grid">
                                    <a class="btn btn-white radius-30" href="{{ url('/') }}"><span
                                            class="d-flex justify-content-center align-items-center">
                                            <span>Visit Your Site</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                                    <hr>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                <i class="bi bi-envelope-fill"></i>
                                            </div>
                                            <input type="email" class="form-control radius-30 ps-5"
                                                id="inputEmailAddress" placeholder="Email Address" name="email"
                                                :value="old('email')" required autofocus autocomplete="username">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                <i class="bi bi-lock-fill"></i>
                                            </div>
                                            <input type="password" class="form-control radius-30 ps-5" name="password"
                                                required autocomplete="current-password" id="inputChoosePassword"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end"> <a href="authentication-forgot-password.html">Forgot
                                            Password ?</a>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary radius-30">Sign
                                                In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--end page main-->
</x-admin-guest>
