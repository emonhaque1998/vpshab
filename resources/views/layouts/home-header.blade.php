<!-- ***** NEWS ***** -->
<div class="sec-bg3 infonews">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-7 news">
                <span class="badge bg-purple me-2">news</span>
                <span>{{ $information->top_title ?? 'No data' }}</span>

            </div>
            <div class="col-6 col-md-5 link">
                <div class="infonews-nav float-end">
                    <a href="tel:1300-656-1046" class="iconews tabphone" title="Phone Number">+88
                        {{ $information->phone_number ?? '01XXXXXXXXX' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="menu-wrap">
    <div class="nav-menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2 col-md-2">
                    <a href="{{ url('/') }}" title="Logo Antler">
                        <img class="svg logo-menu d-block" src="{{ asset('assets/img/logo.svg') }}" alt="logo Antler"
                            width="200" height="50">
                        <img class="svg logo-menu d-none" src="{{ asset('assets/img/logo-light.svg') }}"
                            alt="logo Antler" width="200" height="50">
                    </a>
                </div>
                <nav id="menu" class="col-10 col-md-10">
                    <div class="navigation float-end">
                        <button class="menu-toggle" title="Meunu Nav">
                            <span class="icon"></span>
                            <span class="icon"></span>
                            <span class="icon"></span>
                        </button>
                        <div class="main-menu nav navbar-nav navbar-right">
                            <div class="menu-item menu-item-has-children">
                                <a href="{{ url('/') }}" title="Home Page">Home</a>
                                <div class="badge bg-purple align-middle horizontalShake">new</div>
                            </div>

                            <div class="menu-item menu-item-has-children">
                                <a href="{{ route('residential-vps.index') }}" title="Home Page">Residential VPS</a>
                            </div>
                            <div class="menu-item menu-item-has-children">
                                <a href="{{ route('residential-rdp.index') }}" title="Home Page">Residential RDP</a>
                            </div>
                            <div class="menu-item menu-item-has-children">
                                <a href="{{ route('about.index') }}" title="Home Page">About Us</a>
                            </div>
                            <div class="menu-item menu-item-has-children">
                                <a href="{{ route('contact.index') }}" title="Home Page">Contact Us</a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('login') }}" class="pe-0 me-0" title="Login">
                                    <div class="btn btn-default-yellow-fill question"><span>Client Area</span>
                                        @auth
                                            <i class="fas fa-unlock ps-1"></i>
                                        @else
                                            <i class="fas fa-lock ps-1"></i>
                                        @endauth
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ***** NAV MENU MOBILE ****** -->
<div class="menu-wrap mobile">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <a href="." aria-label="Home Page"><img class="svg logo-menu d-block" src="./assets/img/logo.svg"
                        alt="logo Antler" width="200" height="50"></a>
                <a href="." aria-label="Home Page"><img class="svg logo-menu d-none"
                        src="./assets/img/logo-light.svg" alt="logo Antler" width="200" height="50"></a>
            </div>
            <div class="col-6">
                <nav class="nav-menu float-end d-flex">
                    <div class="tech-box">
                        <img class="svg" src="./assets/img/menu.svg" alt="" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop" width="32"
                            height="32">
                    </div>
                    <button id="nav-toggle" class="menu-toggle" aria-label="Dropdown Menu">
                        <span class="icon"></span>
                        <span class="icon"></span>
                        <span class="icon"></span>
                    </button>
                    <div class="main-menu bg-seccolorstyle">


                        <div class="menu-item mt-2">
                            <a href="{{ url('/') }}" class="mergecolor"
                                >Home</a>
                        </div>
                        <div class="menu-item mt-2">
                            <a href="{{ route('residential-vps.index') }}" class="mergecolor"
                                >Residential VPS</a>
                        </div>
                        <div class="menu-item mt-2">
                            <a href="{{ route("residential-rdp.index") }}" class="mergecolor"
                                data-bs-toggle="dropdown">Residential RDP</a>
                        </div>
                        <div class="menu-item mt-2">
                            <a href="{{ route("about.index") }}" class="mergecolor"
                                >About Us</a>
                        </div>
                        <div class="menu-item mt-2">
                            <a href="{{ route("contact.index") }}" class="mergecolor"
                               >Contact Us</a>
                        </div>
                        <div class="float-start w-100 mt-3">
                            <p class="c-grey-light seccolor"> <small> Phone: + (123) 1300-656-1046</small> </p>
                            <p class="c-grey-light seccolor"><small>Email: antler@mail.com</small> </p>
                        </div>
                        <div>
                            <a href="login">
                                <div class="btn btn-default-yellow-fill mt-3" title="Client Area">CLIENT AREA</div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="menu-wrap mobile">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <a href="." aria-label="Home Page"><img class="svg logo-menu d-block"
                        src="./assets/img/logo.svg" alt="logo Antler" width="200" height="50"></a>
                <a href="." aria-label="Home Page"><img class="svg logo-menu d-none"
                        src="./assets/img/logo-light.svg" alt="logo Antler" width="200" height="50"></a>
            </div>
            <div class="col-6">
                <nav class="nav-menu float-end d-flex">
                    <div class="tech-box">
                        <img class="svg" src="./assets/img/menu.svg" alt="" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                            width="32" height="32">
                    </div>
                    <button id="nav-toggle" class="menu-toggle" aria-label="Dropdown Menu">
                        <span class="icon"></span>
                        <span class="icon"></span>
                        <span class="icon"></span>
                    </button>
                    <div class="main-menu bg-seccolorstyle">
                        <div class="menu-item mt-5">
                            <div class="menu-item mt-2">
                                <a href="{{ url('/') }}" class="mergecolor"
                                    >Home</a>
                            </div>
                            <div class="menu-item mt-2">
                                <a href="{{ route('residential-vps.index') }}" class="mergecolor"
                                    >Residential VPS</a>
                            </div>
                            <div class="menu-item mt-2">
                                <a href="{{ route("residential-rdp.index") }}" class="mergecolor"
                                    data-bs-toggle="dropdown">Residential RDP</a>
                            </div>
                            <div class="menu-item mt-2">
                                <a href="{{ route("about.index") }}" class="mergecolor"
                                    >About Us</a>
                            </div>
                            <div class="menu-item mt-2">
                                <a href="{{ route("contact.index") }}" class="mergecolor"
                                   >Contact Us</a>
                            </div>


                            <div class="float-start w-100 mt-3">
                                <p class="c-grey-light seccolor"> <small> Phone: + (123) 1300-656-1046</small> </p>
                                <p class="c-grey-light seccolor"><small>Email: antler@mail.com</small> </p>
                            </div>
                            <div>
                                <a href="login">
                                    <div class="btn btn-default-yellow-fill mt-3" title="Client Area">CLIENT AREA
                                    </div>
                                </a>
                            </div>
                        </div>
                </nav>
            </div>
        </div>
    </div>
</div>



<!-- Javascript -->
<script>
    $("#nav-toggle").click(function() {
        $(".menu-wrap.mobile, .menu-toggle").toggleClass("active");
    });
</script>
<script>
    function load(img) {
        img.fadeOut(0, function() {
            img.fadeIn(1000);
        });
    }
</script>
