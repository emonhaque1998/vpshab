@isset($products)
    @foreach ($products as $product)
        <div class="col-md-12 col-lg-4">
            <div class="wrapper first">
                <div class="top-content bg-seccolorstyle topradius">
                    <div class="lazyload">
                        <svg class="svg mb-3" viewBox="0 0 32 32">
                            <path id="svg-ico"
                                d="M21.294 1.969h-.232c-5.325.087-10.656 3.756-10.656 10.688 0 .238.194.425.425.425.238 0 .425-.194.425-.425 0-6.719 5.125-9.8 9.912-9.838 5.387.038 9.762 4.438 9.762 9.838 0 5.425-4.412 9.837-9.838 9.837H7.767c-3.725 0-6.756-3.031-6.756-6.756s3.031-6.756 6.756-6.756c.238 0 .425-.194.425-.425s-.194-.425-.425-.425c-4.2-.006-7.612 3.412-7.612 7.606s3.413 7.613 7.612 7.613h13.331c5.894 0 10.694-4.794 10.694-10.694 0-5.825-4.694-10.581-10.5-10.688z" />
                            <path fill="#5e686c"
                                d="M24.413 28.15h-6.781c-.156-.6-.631-1.075-1.231-1.231v-2.194c0-.238-.194-.425-.425-.425-.238 0-.425.194-.425.425v2.194c-.6.156-1.075.631-1.231 1.231H7.539c-.237 0-.425.194-.425.425s.194.425.425.425h6.781c.188.738.863 1.281 1.656 1.281s1.469-.544 1.656-1.281h6.781c.238 0 .425-.194.425-.425s-.188-.425-.425-.425zm-8.438 1.281c-.469 0-.856-.381-.856-.856 0-.469.381-.856.856-.856s.856.381.856.856-.387.856-.856.856zM21.238 6.931c.238 0 .425-.194.425-.431-.006-.237-.219-.444-.431-.425-3.381.044-6.375 2.719-6.675 6.044l.006.075c.006.156.012.313.012.463 0 .238.194.425.425.425.238 0 .425-.194.425-.425 0-.162-.006-.331-.012-.525l-.012-.019c.269-2.819 2.888-5.144 5.838-5.181z" />
                        </svg>
                    </div>
                    <div class="title">{{ $product->title }}</div>
                    @isset($product->category)
                        <div class="fromer seccolor"><b>Category:
                                {{ $product->category->category_name }}</b></div>
                    @endisset
                    <div class="fromer seccolor">Starting at:
                        {{ $product->discount ? $product->discount : '' }}</div>
                    <div class="price seccolor">
                        <sup>{{ $product->currency }}</sup>{{ $product->monthly_price }} <span
                            class="period">/month</span>
                    </div>
                    <a href="{{ url("review/$product->slug") }}" class="btn btn-default-yellow-fill"
                        title="Hosting Overview">Order Now</a>
                </div>
                <ul class="list-info bg-purple">
                    <li><i class="icon-drives"></i> <span class="f-14">Ram</span><br>
                        <span>{{ $product->ram }}GB</span>
                    </li>
                    <li><i class="icon-drives"></i> <span class="f-14">DISK</span><br>
                        <span>{{ $product->disk }}GB SSD</span>
                    </li>
                    <li><i class="icon-speed"></i> <span class="f-14">DATA</span><br>
                        <span>{{ $product->bandwidth }}TB Bandwidth</span>
                    </li>
                    <li><i class="icon-emailopen"></i> <span class="f-14">Operating
                            System</span><br> <span>{{ $product->operating_system }}</span></li>
                    <li><i class="icon-domains"></i> <span class="f-14">Location</span><br>
                        <span>{{ $product->country->name ?? '' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
@endisset