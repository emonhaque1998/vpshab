<x-home-layout>
    <style>
        b {
            color: #ee5586 !important
        }
    </style>
    <!-- ***** BANNER ***** -->
    <div class="top-header">
        <div class="total-grad-inverse"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="heading mb-0">General Terms And Conditions</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cd-filter-block checkbox-group mb-0">
                        <label><a href="#" aria-label="Searching"><i class="fas fa-search"></i></a></label>
                        <input type="text" class="input" placeholder="Search.." />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** KNOWLEDGEBASE ***** -->
    <section id="gotop" class="blog motpath pb-80 bg-colorstyle">
        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-md-12 col-lg-4">
                    <aside id="sidebar" class="sidebar mt-80 sec-bg1 bg-seccolorstyle noshadow">
                        <div class="menu categories clear">
                            <h5 class="mergecolor"><b>Terms</b></h5>
                            <hr>
                            <div class="heading pt-2"><a href="#gotop" id="showall"
                                    class="gocheck active seccolor"><img class="svg me-3"
                                        src="./assets/fonts/svg/select.svg" alt="Dedicated Server"> All General
                                    Terms</a></div>
                            <div class="heading pt-2"><a href="#gotop" class="gocheck showSingle seccolor"
                                    target="1"><img class="svg me-3" src="./assets/fonts/svg/managedserver.svg"
                                        alt="Shared Hosting">Terms & Condition</a></div>
                            <div class="heading pt-2"><a href="#gotop" class="gocheck showSingle seccolor"
                                    target="2"><img class="svg me-3" src="./assets/fonts/svg/privacy.svg"
                                        alt="Cloud Reseller"> Privacy Policy</a></div>
                            <div class="heading pt-2"><a href="#gotop" class="gocheck showSingle seccolor"
                                    target="3"><img class="svg me-3" src="./assets/fonts/svg/network.svg"
                                        alt="Dedicated Server"> Cookie Statement</a></div>
                        </div>
                    </aside>
                </div>
                <div class="pt-35 col-md-12 col-lg-8">
                    <div id="sidebar_content" class="wrap-blog">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 knowledge">
                                <div id="div3" class="wrapper targetDiv mt-5 bg-seccolorstyle noshadow">
                                    <h5><a href="#"
                                            class="category"><b>{{ $cookie->cookie_title ?? 'Cookie Statement' }}</b></a>
                                        <span class="float-end c-grey seccolor">[v2
                                            04/2017]</span>
                                    </h5>
                                    <hr>
                                    <div class="blog-info text-light">
                                        {!! $cookie->cookie_body ?? '' !!}
                                    </div>
                                </div>
                                <div id="div2" class="wrapper targetDiv mt-5 bg-seccolorstyle noshadow">
                                    <h5><a href="#"
                                            class="category"><b>{{ $privacy->privacy_title ?? 'Privacy Policy' }}</b></a>
                                        <span class="float-end c-grey seccolor">[v2 04/2017]</span>
                                    </h5>
                                    <hr>
                                    <div class="blog-info text-light">
                                        {!! $privacy->privacy_body ?? '' !!}
                                    </div>
                                </div>
                                <div id="div1" class="wrapper targetDiv mt-5 bg-seccolorstyle noshadow">
                                    <h5><b><a href="#"
                                                class="category">{{ $terms->terms_title ?? 'Terms & Condition' }}</a></b>
                                        <span class="float-end c-grey seccolor">[v2
                                            09/2018]</span>
                                    </h5>
                                    <hr>
                                    <div class="blog-info text-light">
                                        {!! $terms->terms_body ?? '' !!}
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ***** HELP ***** -->
    <x-help />
    <!-- ***** UPLOADED FOOTER FROM FOOTER.HTML ***** -->
</x-home-layout>
