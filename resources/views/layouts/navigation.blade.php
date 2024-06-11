<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3 align-items-center">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
        </div>
       
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">
                    <a class="nav-link" href="#">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        data-bs-toggle="dropdown">
                        <div class="projects">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="row row-cols-3 gx-2">
                            <div class="col">
                                <a href="{{ route("all-orders.index") }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                                            <i class="bi bi-basket2-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Orders</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route("all-users.index") }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Users</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route("all-products.index") }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                                            <i class="bi bi-trophy-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Products</p>
                                    </div>
                                </a>
                            </div>
                            
                        </div><!--end row-->
                    </div>
                </li>
               
                
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center">
                            <img src="{{ asset(Auth::guard('admin')->user()->profileImage) }}" class="user-img"
                                alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset(Auth::guard('admin')->user()->profileImage) }}" alt=""
                                        class="rounded-circle" width="54" height="54">
                                    <div class="ms-3">
                                        <h6 class="mb-0 dropdown-user-name">
                                            {{ Auth::guard('admin')->user()->name ?? '' }}</h6>
                                        <small
                                            class="mb-0 dropdown-user-designation text-secondary">{{ Auth::guard('admin')->user()->designation }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                       
                        
                        <li>
                            <x-logout-form routeName="admin.logout" />
                            <a class="dropdown-item" href="#" id="logout_submit">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms-3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end top header-->
