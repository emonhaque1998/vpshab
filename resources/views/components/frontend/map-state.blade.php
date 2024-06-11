@isset($countries)
        @foreach ($countries as $country)
            <style>
                .maping .datacenters.{{ $country->name }} {
                    top: {{ $country->vertical }}%;
                    left: {{ $country->horizontal }}%;
                }
            </style>
        @endforeach
    @endisset
<section class="services maping sec-normal sec-grad-grey-to-grey bg-colorstyle pb-5">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="section-heading text-white mergecolor">Our Datacenters are Located in
                        {{ count($countries) ?? '0' }} Regions</h2>
                    <p class="section-subheading text-light mergecolor"><span
                            class="golink">{{ $map->sub_title ?? '' }}</span></p>
                </div>
                <div class="col-md-12 pt-5 position-relative">
                    <div class="lazyload">
                        <img src="assets/patterns/map.svg" class="w-10" alt="Load Balancing">
                    </div>
                    @isset($countries)
                        @foreach ($countries as $country)
                            <span class="datacenters {{ $country->name }} space-pos-span" data-bs-toggle="popover"
                                data-bs-container="body" data-bs-trigger="hover" data-bs-placement="top"
                                title="{{ $country->name }}" data-bs-html="true"
                                data-bs-content="

                                  @forelse ($country->getProduct as $product)
                                    {{ $product->title }} </br>
                                    @empty
                                        Comming Soon
                                    @endforelse
                                "
                                role="button" aria-label="{{ $country->name }}"></span>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
