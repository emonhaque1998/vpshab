<x-user-layout>
    <div id="cover-spin"></div>
    <div class="left_side for_modifyed">
        <x-according id="accountAccording" title="Accounts" icon="fa-solid fa-user">
            <ul>
                <li class="{{ request()->routeIs('account-setting.index') ? 'active_user' : null }}"><a
                        href="">Account
                        Details</a></li>
                <li><a href="">User Management</a></li>
                <li><a href="">Payment Methods</a></li>
            </ul>
        </x-according>
        <x-according id="foundAccourding" title="Available Credit" icon="fa-solid fa-user">
            <strong style="text-align: center">$0.00</strong>
            <br>
            <button class="btn btn-primary btn-sm w-100">Add Funds</button>
        </x-according>
    </div>

    <div class="right_side background_right mb-5">
        <h3 class="text-body-secondary text-light">Account Details</h3>
        <form id="userInformationForm" action="" class="mt-5">
            @csrf
            {{-- <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
            </div> --}}

            <div class="mb-3 col-lg-12">
                <label for="fullName" class="form-label text-light">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter Full Name"
                    value="{{ Auth::user()->name ? Auth::user()->name : null }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-light">Email Address</label>
                <input type="email" value="{{ Auth::user()->email ? Auth::user()->email : null }}"
                    {{ Auth::user()->email ? 'disabled' : null }} class="form-control" id="email" name="email"
                    placeholder="Enter Your Email">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="addressFirst" class="form-label text-light">Address 1</label>
                    <input type="text" name="addressFirst"
                        value="{{ Auth::user()->addressFirst ? Auth::user()->addressFirst : null }}"
                        class="form-control" id="addressFirst">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="addressSecond" class="form-label text-light">Address 2</label>
                    <input type="text" value="{{ Auth::user()->addressSecond ? Auth::user()->addressSecond : null }}"
                        class="form-control" id="addressSecond" name="addressSecond">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="companyName" class="form-label text-light">Company Name</label>
                    <input type="text" value="{{ Auth::user()->companyName ? Auth::user()->companyName : null }}"
                        name="companyName" class="form-control" id="companyName" placeholder="Enter Your Company Name">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="mobile" class="form-label text-light">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile"
                        value="{{ Auth::user()->mobile ? Auth::user()->mobile : null }}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6">
                    <label for="" class="form-label text-light">Country</label>
                    <select class="form-select bg-dark text-light" aria-label="Default select example" name="country"
                        id="countryList">
                        @isset($countries)
                            @foreach ($countries as $country)
                                <option {{ Auth::user()->country === $country['code3'] ? 'selected' : null }}
                                    value="{{ $country['code3'] }}">
                                    {{ $country['name'] }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="addressSecond" class="form-label text-light">City</label>
                    <select class="form-select bg-dark text-light" aria-label="Default select example" name="stateList"
                        id="stateList">
                        @isset(Auth::user()->stateList)
                            <option value="{{ Auth::user()->stateList }}" selected>{{ Auth::user()->stateList }}</option>
                        @endisset
                    </select>
                </div>
            </div>
            <div class="submitButtonForInformation mt-3">
                <x-submit btnId="user_information_save_btn" btnText="Save Changes" />
            </div>
        </form>
    </div>
</x-user-layout>
