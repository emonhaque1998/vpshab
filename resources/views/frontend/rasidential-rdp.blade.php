<x-home-layout>
    <!-- ***** BANNER ***** -->
    <div class="top-header overlay-video">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="wrapper">
                        <h1 class="heading">Residential RDP</h1>

                        <p class="subheading h4">{{ $pageInformation->pageSubTitle ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="banner-video">
                <div class="cover-wrapper">
                    <div class="lazyload">
                        <video class="cover-video" autoplay loop muted>
                            @isset($pageInformation->videoUrl)
                                <source src="{{ asset("$pageInformation->videoUrl") }}" type="video/mp4">
                            @endisset
                            <track src="captions_en.vtt" kind="captions" srclang="en" label="english_captions">
                            <track src="captions_es.vtt" kind="captions" srclang="pt" label="portuguese_captions">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** PRICING TABLES ***** -->
    <section class="pricing special sec-bg2 bg-colorstyle specialposition mt-5">
        <div class="container">
            <div class="sec-up-slider nopadding">
                <div class="row">
                    
                    @isset($category)
                        <x-product-view :products="$category->product" />
                    @endisset
                </div>
            </div>
        </div>
    </section>


    <!-- ***** SPECIFICATIONS ***** -->
    <x-specification />
    <!-- ***** HELP ***** -->
    <x-rdptovps />



    <x-slot:scripts>
        <script defer type="text/javascript" src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    </x-slot>
</x-home-layout>
