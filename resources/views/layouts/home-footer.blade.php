<!-- ***** FOOTER ****** -->
<footer class="footer">
    <img class="logo-bg logo-footer" style="margin-top: -50px" src="{{ asset("assets/img/wathermark.svg") }}" alt="logo" width="600" height="290">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="heading">Services</div>
                    <ul class="footer-menu">
                        <li class="menu-item"><a href="{{ route('residential-vps.index') }}"
                                title="Shared Hosting">Residential VPS</a></li>
                        <li class="menu-item"><a href="{{ route('residential-rdp.index') }}"
                                title="Dedicated Server">Residential RDP</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="heading">Support</div>
                    <ul class="footer-menu">
                        <li class="menu-item"><a href="{{ route("knowledge-base.index") }}" title="Knowledge Base">Knowledge Base</a>
                        </li>
                        <li class="menu-item"><a href="{{ route('contact.index') }}" title="Contact Us">Contact Us</a>
                        </li>
                        <li class="menu-item"><a href="{{ route("faq.index") }}" title="FAQ">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="heading">Company</div>
                    <ul class="footer-menu">
                        <li class="menu-item"><a href="{{ route('about.index') }}" title="About Us">About Us</a> </li>
                        <li class="menu-item"><a href="{{ route('privacy-policy.index') }}" title="Legal">Privacy
                                Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="{{ url('/') }}">
                        <img class="svg logo-footer d-block" src="{{ asset("assets/img/logo.svg") }}" alt="logo" width="200"
                            height="50">
                        <img class="svg logo-footer d-none" src="{{ asset("assets/img/logo-light.svg") }}" alt="logo"
                            width="200" height="50">
                    </a>
                    <div class="copyright">{{ $information->wb_site_short_about ?? '' }}</div>
                    <div class="soc-icons">
                        @isset($information->facebook)
                            <a href="{{ $information->facebook }}" title="Facebook"><i
                                    class="fab fa-facebook-f withborder noshadow"></i></a>
                        @endisset
                        @isset($information->youtube)
                            <a href="{{ $information->youtube }}" title="youtube"><i
                                    class="fab fa-youtube withborder noshadow"></i></a>
                        @endisset
                        @isset($information->twiter)
                            <a href="{{ $information->twiter }}" title="Twitter"><i
                                    class="fab fa-x-twitter withborder noshadow"></i></a>
                        @endisset
                        @isset($information->instagram)
                            <a href="{{ $information->instagram }}" title="Twitter"><i
                                    class="fab fa-x-twitter withborder noshadow"></i></a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subcribe news">
        <div class="container">
            <div class="row">
                <form action="{{ route('subscribe.store') }}" method="POST" class="w-100">
                    @csrf
                    <div class="col-md-6 offset-md-3">
                        <div class="general-input">
                            <input class="fill-input" type="email" name="email" required
                                placeholder="Input you Email for updates" id="subscribe">
                            <input type="submit" value="SUBSCRIBE"
                                class="btn btn-default-yellow-fill initial-transform">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3 text-center pt-4">
                        <p>Subscribe our newsletter to receive news and updates</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="footer-menu">
                        <li class="menu-item by">VPSHab<span class="c-pink"> ♥</span> Copyright@2024

                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="payment-list">
                        <li>
                            <p>Payments We Accept</p>
                        </li>
                        <li><i class="fab fa-cc-paypal"></i></li>
                        <li><i class="fab fa-cc-visa"></i></li>
                        <li><i class="fab fa-cc-mastercard"></i></li>
                        <li><i class="fab fa-cc-apple-pay"></i></li>
                        <li><i class="fab fa-cc-discover"></i></li>
                        <li><i class="fab fa-cc-amazon-pay"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/660506dba0c6737bd125c491/1hq1q5j43';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->




</footer>
<script>
    $(document.body)
        .on("gdpr:show", function() {
            console.log("Cookie dialog is shown");
        })
        .on("gdpr:accept", function() {
            var preferences = $.gdprcookie.preference();
            console.log("Preferences saved:", preferences);
        })
        .on("gdpr:advanced", function() {
            console.log("Advanced button was pressed");
        });
</script>
