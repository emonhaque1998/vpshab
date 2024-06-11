<x-home-layout>
    <script>
        $(document).ready(function() {
            const myDefaultAllowList = bootstrap.Tooltip.Default.allowList
            // To allow elements and attributes on elements
            myDefaultAllowList.input = ['type', 'checked']
            myDefaultAllowList.label = ['for']

            $('[data-bs-content]').popover({
                allowList: myDefaultAllowList,
                html: true
            })

            /* or just disable the sanitzer
            $('[data-bs-toggle="popover"]').popover({
              sanitize: false
            })
            */
        })
    </script>
    <!-- BANNER -->
    <section class="top-header sec-bg6 pb-150 bg-colorstyle">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="wrapper">
                        <h1 class="heading mergecolor pb-2" data-aos="fade-up" data-aos-duration="800">
                            {{ $information->title ?? 'High-Performance Dedicated Servers' }}</h1>
                        <h2 style="font-size: 18px" class="subheading fw-normal text-light mb-5" data-aos="fade-up"
                            data-aos-duration="1200">{{ $information->discription ?? 'Description Not Found' }}
                        </h2>
                        <a href="{{ route('residential-vps.index') }}" class="btn btn-default-yellow-fill me-2"
                            title="Hosting Order Now">{{ $information->btn1_name ?? 'Order Now' }} <i
                                class="fas fa-cart-plus ps-1 f-15"></i></a>
                    </div>
                </div>
                <div class="col-md-1 mb-5"></div>
                <div class="col-md-4">
                    <div class="service-section text-center mt-0 d-none767">
                        <div class ="lazyload">
                            <svg class="svg" x="0" y="0" version="1.1" viewBox="0 0 650 650" width="420"
                                height="420">
                                <style>
                                    .st0,
                                    .st1,
                                    .st2 {
                                        fill: none;
                                        stroke: #ee5586;
                                        stroke-width: 3;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                        stroke-miterlimit: 10
                                    }

                                    .st1,
                                    .st2 {
                                        stroke: gray;
                                        stroke-width: 2
                                    }

                                    .st2 {
                                        stroke: #ee5586
                                    }
                                </style>
                                <path id="svg-concept"
                                    d="M572.7 642.6H67.5a15 15 0 0 1-15-15V269.4a15 15 0 0 1 15-15h505.2a15 15 0 0 1 15 15v358.1a15 15 0 0 1-14.9 15.1h-.1zm17.5-437.9c0 7.8-6.3 14.2-14.2 14.2H69.1c-7.8 0-14.2-6.3-14.2-14.2v-184c0-7.8 6.3-14.2 14.2-14.2H576c7.8 0 14.2 6.3 14.2 14.2v184z"
                                    class="st0" />
                                <path
                                    d="M173.3 35.2h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5V44.7c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <path
                                    d="M174.3 56.8h243.6c6.3 0 11.3 5.1 11.3 11.3v0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3v0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="68.2" r="4.3" class="st2" />
                                <circle cx="390.5" cy="68.2" r="4.3" class="st1" />
                                <path
                                    d="M174.3 144.8h243.6c6.3 0 11.3 5.1 11.3 11.3v0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3v0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="156.1" r="4.3" class="st2" />
                                <circle cx="390.5" cy="156.1" r="4.3" class="st1" />
                                <path
                                    d="M173.3 123.2h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5v-46.9c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <circle id="svg-concept" cx="482.2" cy="156.1" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 156.1c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                                <circle id="svg-concept" cx="482.2" cy="68.1" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 68.1c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                                <path
                                    d="M173.3 283h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5v-46.9c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <path
                                    d="M174.3 304.6h243.6c6.3 0 11.3 5.1 11.3 11.3v0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3v0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="316" r="4.3" class="st2" />
                                <circle cx="390.5" cy="316" r="4.3" class="st1" />
                                <path
                                    d="M174.3 392.6h243.6c6.3 0 11.3 5.1 11.3 11.3v0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3v0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="403.9" r="4.3" class="st2" />
                                <circle cx="390.5" cy="403.9" r="4.3" class="st1" />
                                <path
                                    d="M173.3 371h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5v-46.9c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <circle id="svg-concept" cx="482.2" cy="403.9" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 403.9c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                                <circle id="svg-concept" cx="482.2" cy="315.9" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 315.9c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                                <path
                                    d="M173.3 460.8h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5v-46.9c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <path
                                    d="M174.3 482.4h243.6c6.3 0 11.3 5.1 11.3 11.3v0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3v0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="493.8" r="4.3" class="st2" />
                                <circle cx="390.5" cy="493.8" r="4.3" class="st1" />
                                <path
                                    d="M174.3 570.4h243.6c6.3 0 11.3 5.1 11.3 11.3h0c0 6.3-5.1 11.3-11.3 11.3H174.3c-6.3 0-11.3-5.1-11.3-11.3h0c-.1-6.2 5-11.3 11.3-11.3z"
                                    class="st1" />
                                <circle id="svg-concept" cx="407.3" cy="581.7" r="4.3" class="st2" />
                                <circle cx="390.5" cy="581.7" r="4.3" class="st1" />
                                <path
                                    d="M173.3 548.8h347.9c4.8 0 8.6 4.3 8.6 9.5v46.9h0c0 5.3-3.8 9.5-8.6 9.5h-402c-4.8 0-8.6-4.3-8.6-9.5v-46.9c0-5.3 3.8-9.5 8.6-9.5h54.1"
                                    class="st1" />
                                <circle id="svg-concept" cx="482.2" cy="581.7" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 581.7c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                                <circle id="svg-concept" cx="482.2" cy="493.7" r="17" class="st0" />
                                <path id="svg-concept"
                                    d="M488.6 493.7c0 3.5-2.8 6.3-6.3 6.3a6.3 6.3 0 0 1-6.3-6.3c0-3.6 2.8-6.3 6.3-6.3 3.4 0 6.3 2.8 6.3 6.3z"
                                    class="st2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** PRICING TABLES ***** -->
    <section class="pricing special sec-bg2 bg-colorstyle specialposition">
        <div class="container">
            <div class="sec-up-slider nopadding">
                <div class="row">
                    <x-product-view :products="$products" />
                </div>
            </div>
        </div>
    </section>
    <!-- ***** MAP ***** -->
    <x-map />
    <!-- ***** FEATURES ***** -->
    <svg class="division-ontop bg-white d-none" viewBox="0 0 1440 150">
        <path fill="#fdd700" fill-opacity="1"
            d="M0,96L120,85.3C240,75,480,53,720,53.3C960,53,1200,75,1320,85.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
        </path>
    </svg>
    <section class="services sec-normal sec-bg4">
        <div class="container">
            <div class="service-wrap">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="section-heading">Why Choose VPShab?</h2>
                        <p class="section-subheading">VPShab provide Fast and Efficient Service,Reliability and
                            Trustworthiness.</p>
                    </div>
                    <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                        <div class="service-section bg-colorstyle">
                            <div class="plans badge feat bg-purple">Premium</div>
                            <div class="lazyload">
                                <svg class="svg" viewBox="0 0 32 32" width="60" height="60">
                                    <path fill="#5e686c"
                                        d="M12 20.76a1.72 1.72 0 1 1 0-3.43 1.72 1.72 0 0 1 0 3.43zm0-2.57c-.48 0-.86.38-.86.86s.38.86.85.86a.86.86 0 0 0 0-1.72zm8.54 2.57a1.71 1.71 0 1 1 0-3.43 1.71 1.71 0 0 1 0 3.43zm0-2.57c-.47 0-.85.38-.85.86s.38.86.85.86a.86.86 0 0 0 0-1.72z" />
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M18.5 28.79a2.15 2.15 0 1 1 0-4.3 2.15 2.15 0 0 1 0 4.3zm0-3.43a1.29 1.29 0 0 0 0 2.58 1.29 1.29 0 0 0 0-2.58z" />
                                    <path fill="#5e686c"
                                        d="M24.83 15.38a17.47 17.47 0 0 1-12.75-5.37c-.16-.2-.26-.18-.37-.02L7.1 15.2a.43.43 0 0 1-.6.04.43.43 0 0 1-.04-.6l4.57-5.2c.37-.5 1.29-.53 1.7.02.03.03 4.8 5.45 13 5.03.26-.01.44.17.45.4s-.17.44-.4.46l-.96.02zM16.37 31.8c-6.05 0-10.44-4.55-10.44-10.83a.43.43 0 0 1 .86 0c0 5.78 4.03 9.98 9.58 9.98s9.58-4.05 9.58-9.63a.43.43 0 0 1 .87 0A10.25 10.25 0 0 1 16.37 31.8z" />
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M28.79 21.72h-1.71c-.93 0-1.72-.79-1.72-1.71v-6c0-.93.8-1.72 1.72-1.72h1.7c.94 0 1.72.8 1.72 1.72v6c0 .93-.79 1.7-1.71 1.7zm-1.71-8.57c-.45 0-.86.4-.86.86v6c0 .45.4.85.85.85h1.72c.45 0 .85-.4.85-.85v-6c0-.45-.4-.86-.85-.86h-1.72z" />
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M20.3 27.06a.43.43 0 0 1 0-.86h1.6c.13-.01 4.05-.35 4.05-5.13a.43.43 0 0 1 .86 0c0 5.6-4.84 5.98-4.89 5.99h-1.61zM5.5 21.75H3.77c-.93 0-1.72-.79-1.72-1.73V14c0-.93.79-1.73 1.73-1.73h.51A12.17 12.17 0 0 1 16.46.2c6.7 0 12.15 5.61 12.15 12.5a.43.43 0 0 1-.87 0c0-6.42-5.06-11.65-11.29-11.65-6.2 0-11.26 5.03-11.3 11.23h.35c.93 0 1.73.79 1.73 1.72v6.04c-.01.93-.8 1.72-1.73 1.72zm-1.73-8.63a.9.9 0 0 0-.86.87v6.03c0 .45.41.87.86.87H5.5a.9.9 0 0 0 .87-.87V14a.9.9 0 0 0-.87-.87H3.77z" />
                                </svg>
                            </div>
                            <div class="title mergecolor">Support 24x7x365</div>
                            <p class="subtitle seccolor" id="supportContent">
                                Need anything? Just get in touch anytime.
                            </p>
                            <a href="#" class="btn btn-default-yellow-fill" title="Read More" id="supportBtn">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-duration="800">
                        <div class="service-section bg-colorstyle">
                            <div class="plans badge feat bg-purple">Control Panel</div>
                            <div class="lazyload">
                                <svg class="svg mb-3" viewBox="0 0 32 32" width="60" height="60"
                                    style="">
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M24.68 17.74a1.68 1.68 0 1 0 0 3.36 1.68 1.68 0 0 0 0-3.36zm0 2.53a.84.84 0 1 1 0-1.68.84.84 0 1 1 0 1.68z">
                                    </path>
                                    <path fill="#5e686c"
                                        d="M29.54 13.54H2.46c-1.12 0-2.02.84-2.02 1.86v8.05c0 1.03.9 1.86 2.02 1.86h27.08c1.12 0 2.02-.83 2.02-1.86V15.4c0-1.02-.9-1.86-2.02-1.86zm1.18 9.91c0 .56-.53 1.02-1.18 1.02H2.46c-.65 0-1.18-.45-1.18-1.02V15.4c0-.56.53-1.03 1.18-1.03h27.08c.65 0 1.18.46 1.18 1.03v8.05z">
                                    </path>
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M24.68 4.66a1.68 1.68 0 1 0 0 3.36 1.68 1.68 0 0 0 0-3.36zm0 2.53c-.46 0-.84-.38-.84-.85s.37-.83.84-.83.85.37.85.83c0 .47-.39.85-.85.85z">
                                    </path>
                                    <path fill="#5e686c"
                                        d="M29.54.46H2.46C1.34.46.44 1.29.44 2.32v8.05c0 1.02.9 1.86 2.02 1.86h27.08c1.12 0 2.02-.84 2.02-1.86V2.32c0-1.03-.9-1.86-2.02-1.86zm1.18 9.9c0 .57-.53 1.03-1.18 1.03H2.46c-.65 0-1.18-.45-1.18-1.02V2.32c0-.56.53-1.03 1.18-1.03h27.08c.65 0 1.18.46 1.18 1.03v8.05zM25.99 29.8h-8.36a1.7 1.7 0 0 0-1.2-1.21V26.7a.42.42 0 0 0-.84 0v1.88c-.59.15-1.06.62-1.2 1.21H6a.42.42 0 0 0 0 .84h8.36a1.69 1.69 0 0 0 3.26 0H26a.42.42 0 0 0 0-.84zM16 31.06a.84.84 0 1 1 0-1.69.84.84 0 0 1 0 1.7z">
                                    </path>
                                </svg>
                            </div>
                            <div class="title mergecolor">Enterprise Hardware</div>
                            <p class="subtitle seccolor" id="supportContent">
                                Our own IT interfrecture, which is more powerful.
                            </p>
                            <a href="#" class="btn btn-default-yellow-fill" id="supportBtn" title="Read More">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-duration="900">
                        <div class="service-section bg-colorstyle">
                            <div class="lazyload">
                                <svg class="svg" viewBox="0 0 32 32" width="60" height="60">
                                    <path fill="#5e686c"
                                        d="M5.76 17.57a.42.42 0 0 1-.42-.41v-.4l-.71-.7-2.84-.01a.43.43 0 0 1-.38-.26l-.84-2.05a.43.43 0 0 1 .08-.45l1.97-2.08v-.98L.65 8.2a.41.41 0 0 1-.1-.46l.86-2.04a.42.42 0 0 1 .37-.25l2.86-.08.7-.7.03-2.83c0-.17.1-.32.26-.39L7.66.62a.43.43 0 0 1 .45.08l2.08 1.98h1l2-1.99c.12-.12.3-.15.46-.08l2.04.85c.15.06.25.2.25.37l.08 2.86.7.7 2.83.02c.17 0 .32.1.39.26l.84 2.05c.06.15.03.33-.09.45l-1.97 2.07v.87a.42.42 0 0 1-.84 0v-1.04c0-.1.04-.21.12-.29l1.9-2-.63-1.53-2.73-.02a.4.4 0 0 1-.3-.12l-.93-.94a.45.45 0 0 1-.12-.29l-.07-2.75-1.53-.64-1.94 1.91a.52.52 0 0 1-.3.12h-1.33a.44.44 0 0 1-.29-.12l-2-1.9-1.53.64-.02 2.72a.4.4 0 0 1-.13.3l-.94.94a.43.43 0 0 1-.29.12l-2.75.07-.64 1.53 1.91 1.94c.08.08.12.19.12.3v1.32c0 .1-.05.22-.12.29l-1.9 2 .63 1.54 2.73.02a.4.4 0 0 1 .3.12l.94.95c.07.07.12.18.12.28l.02.56c0 .23-.18.42-.42.43z" />
                                    <path fill="#5e686c"
                                        d="M10.67 14.51a3.76 3.76 0 0 1-3.48-5.24 3.78 3.78 0 1 1 3.48 5.24zm.01-6.72a2.94 2.94 0 1 0-.01 5.88 2.94 2.94 0 0 0 .01-5.88zm4.42 13.44a.42.42 0 0 1-.42-.42l-.01-.45v-.08a6.73 6.73 0 0 1 6.55-5.94c.22 0 .42.18.42.42a.4.4 0 0 1-.4.42c-2.9.04-5.48 2.32-5.74 5.1l.01.01.01.52c0 .23-.19.42-.42.42z" />
                                    <path id="svg-ico" fill="#ee5586"
                                        d="M21.09 31.31H7.99a7.48 7.48 0 0 1 0-14.95.42.42 0 0 1 0 .84 6.64 6.64 0 0 0 0 13.28h13.1a9.67 9.67 0 0 0 .07-19.33c-4.7.03-9.73 3.06-9.73 9.66a.42.42 0 0 1-.84 0c0-6.81 5.24-10.42 10.47-10.5h.22a10.51 10.51 0 0 1-.2 21z" />
                                </svg>
                            </div>
                            <div class="title mergecolor">Perfomance Optimized</div>
                            <p class="subtitle seccolor" id="supportContent">
                                Powerful Virtualization, Scalability, Resource Efficiency.
                            </p>
                            <a href="#" class="btn btn-default-yellow-fill" id="supportBtn" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CASE STUDY ***** -->
    <x-case-study />
    <!-- ***** HELP ***** -->
    <x-help />
    <!-- ***** UPLOADED FOOTER FROM FOOTER.HTML ***** -->

</x-home-layout>
