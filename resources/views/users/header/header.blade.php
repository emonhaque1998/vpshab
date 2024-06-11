<section class="casestudy sec-bg2 bg-colorstyle py- background-shadow margin-top">
    <div class="sec-main sec-up bg-white mb-0 nomargin px-1 br-12 background-shadow" style="border-radius: 0px;">


        <div class="secondary_nav">
            <div class="container">
                <div class="nav_menu">
                    <ul>
                        <li><a href="{{ route('dashboard.index') }}"
                                class="{{ request()->routeIs('dashboard.index') ? 'active' : null }}">Home</a></li>
                        <li>
                            <a href="#">Service <i class="fa-solid fa-arrow-down nave_icon"></i></a>
                            <ul class="parent_active">
                                <li>
                                    <a href="{{ route('my-services.index') }}">My Service</a>
                                </li>
                                <li>
                                    <a href="{{ route('residential-vps.index') }}">Order New Service</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Billing <i class="fa-solid fa-arrow-down nave_icon"></i></a>
                            <ul>
                                <li><a href="{{ route('my-invoice.index') }}">My Invoices</a></li>
                                {{-- <li><a href="">Payment Methods</a></li> --}}
                                <li><a href="{{ route("add-fund.index") }}">Add Funds</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="">Support <i class="fa-solid fa-arrow-down nave_icon"></i></a>
                            <ul>
                                <li><a href="{{ route('announcements.index') }}">Announcements</a></li>
                                {{-- <li><a href="">Status Page</a></li> --}}
                                <li><a href="{{ route('ticket.index') }}">Tickets</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('open-ticket.index') }}">Open Ticket</a></li>
                    </ul>
                    <ul>
                        <li>
                            <a class="" style="cursor: pointer">Hello, {{ Auth::user()->name }} <i
                                    class="fa-solid fa-arrow-down nave_icon"></i></a>
                            <ul>
                                <li><a href="{{ route('account-setting.index') }}">Account Details</a></li>
                                {{-- <li><a href="">User Management</a></li>
                                <li><a href="">Payment Methods</a></li> --}}
                                {{-- <li><a href="">Contacts</a></li> --}}
                                <li><a href="{{ route('my-profile.index') }}">Your Profile</a></li>
                                <li><a href="{{ route('change-password.index') }}">Change Password</a></li>
                                <li><a href="" id="logout_submit">Logout</a></li>
                                <x-logout-form routeName="logout" />
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
