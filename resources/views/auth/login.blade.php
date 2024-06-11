<x-guest-layout>
    <div class="fullrock config sec-bg3 motpath bg-colorstyle">
        <a onclick="window.history.go(-1); return false;" class="closebtn">
            <img class="svg closer bg-transparent" src="./assets/fonts/svg/close.svg" alt="">
        </a>
        <section class="fullrock-content">
            <div class="container">
                <a href="{{ url("/") }}"><img class="svg logo-menu d-block" src="./assets/img/logo.svg" alt="logo Antler"></a>
                <a href="{{ url("/") }}"><img class="svg logo-menu d-none" src="./assets/img/logo-light.svg"
                        alt="logo Antler"></a>
                <div class="sec-main sec-bg1 tabs bg-seccolorstyle noshadow">
                    <div class="randomline">
                        <div class="bigline"></div>
                        <div class="smallline"></div>
                    </div>
                    <h2 class="mergecolor"><b>Login or Create a New Account</b></h2>
                    <p class="mb-5 mergecolor">If you are a returning customer, please Login if not, create a new
                        account.</p>
                    <div class="tabs-header btn-select-customer">
                        <ul class="btn-group d-block">
                            <li class="btn btn-secondary active mb-2">Already Registered?</li>
                            <li class="btn btn-secondary">Create a New Account</li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table tabs-item active">
                                <div class="cd-filter-block mb-0">
                                    <h4 class="m-0 mergecolor">Existing Customer Login</h4>
                                    <div class="cd-filter-content">
                                        <form method="POST" action="{{ route('login') }}" class="comments-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 position-relative">
                                                    <label><i class="fas fa-envelope"></i></label>
                                                    <input type="email" name="email" placeholder="Enter email"
                                                        :value="old('email')" required autofocus
                                                        autocomplete="username">
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label><i class="fas fa-lock"></i></label>
                                                    <input type="password" type="password" name="password" required
                                                        autocomplete="current-password" placeholder="Enter Password">
                                                </div>
                                                <div class="col-md-12 mt-5 position-relative">
                                                    <button type="submit" value="login" id="login"
                                                        class="btn btn-default-yellow-fill mt-0 mb-3 me-3">Login <i
                                                            class="fas fa-lock"></i>
                                                    </button>
                                                    <a href="{{ route('password.request') }}"
                                                        class="golink me-3 position-relative">Forgot Password?</a>
                                                    <ul class="list d-inline">
                                                        <li>
                                                            <input name="remember" type="checkbox" id="checkbox"
                                                                class="filter">
                                                            <label for="checkbox"
                                                                class="checkbox-label c-grey seccolor">Remember
                                                                Me</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table tabs-item">
                                <div class="cd-filter-block mb-0">
                                    <h4 class="mergecolor">Sign Up</h4>
                                    <div class="cd-filter-content">
                                        <form method="POST" action="{{ route('register') }}" name="orderfrm"
                                            class="comments-form">
                                            @csrf
                                            <div class="seccolor"><small>Personal Information</small></div>
                                            <div class="row mb-5">
                                                <div class="col-md-6 position-relative">
                                                    <label for="firstname"><i class="fas fa-user-tie"></i></label>
                                                    <input type="text" name="name" placeholder="Full Name"
                                                        :value="old('name')" required autofocus autocomplete="name">
                                                </div>
                                                <div class="col-md-6 position-relative">
                                                    <label for="inputLastName"><i class="fas fa-user-tie"></i></label>
                                                    <input type="text" type="email" placeholder="Enter Email"
                                                        name="email" :value="old('email')" required
                                                        autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="mergecolor"><small>Account Security</small></div>
                                                <div class="row mb-5">
                                                    <div class="col-md-6 position-relative">
                                                        <label for="inputNewPassword1"><i
                                                                class="fas fa-lock"></i></label>
                                                        <input type="password" name="password" required
                                                            autocomplete="new-password" placeholder="Password">
                                                    </div>
                                                    <div class="col-md-6 position-relative">
                                                        <label for="inputNewPassword2"><i
                                                                class="fas fa-lock"></i></label>
                                                        <input type="password" name="password_confirmation" required
                                                            autocomplete="new-password"
                                                            placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <button type="submit" value="Submit"
                                                    class="btn btn-default-yellow-fill mb-1 disable-on-click spinner-on-click ">Register</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
