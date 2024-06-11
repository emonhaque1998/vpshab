<x-home-layout>
    @include('users.header.header')
    <!-- ***** KNOWLEDGEBASE ***** -->
    <div id="cover-spin"></div>
    <section class="config cd-main-content blog sec-normal sec-bg2 cpupath pt-80 bg-seccolorstyle"
        style="margin-top: -20px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="sec-main sec-bg1 tabs bg-seccolorstyle noshadow">
                        <h1 class="mergecolor">Checkout</h1>
                        <p class="mb-5 mergecolor">{{ $product->title ?? '' }}</p>

                        <div class="row">
                            <div class="col-sm-12">


                                <div class="cd-filter-block m-0">
                                    <div class="cd-filter-content">
                                        <div class="seccolor h5">Payment Details</div>
                                        <div class="radio-group radios-filter cd-filter-content list w-100">
                                            <div class="table-responsive-sm">
                                                <form method="POST" action="{{ url('/sassion') }}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->title }}"
                                                        name="productName">
                                                    <input type="hidden" value="{{ $product->id }}" name="productId">
                                                    <table class="table compare min mb-5">
                                                        <tbody>
                                                            <tr>
                                                                <td class="border-0">
                                                                    <div class="badge bg-purple me-1">Value</div> <span
                                                                        class="seccolor">Total Quantity</span>
                                                                </td>
                                                                <td class="border-0"><b class="float-end h4 seccolor">
                                                                        x{{ $quantity ?? '0' }}
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-0">
                                                                    <div class="badge bg-purple me-1">Value</div> <span
                                                                        class="seccolor">Fresh Ip</span>
                                                                </td>
                                                                <td class="border-0"><b
                                                                        class="float-end h4 seccolor">{{ $product->currency ?? null }}
                                                                        {{ $freshIp * $quantity ?? '0' }}
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-0">
                                                                    <div class="badge bg-purple me-1">Value</div> <span
                                                                        class="seccolor">Total Due Today</span>
                                                                </td>
                                                                <input type="hidden" name="freshIp" value="{{ $freshIp }}">
                                                                <td class="border-0"><b
                                                                        class="float-end h4 seccolor">{{ $product->currency ?? null }}
                                                                        {{ ($product->monthly_price * $quantity) + ($freshIp * $quantity) ?? '0' }}
                                                                    </b></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-0">
                                                                    <div class="badge bg-grey me-1">Select</div> <span
                                                                        class="seccolor">Payments Methods</span>
                                                                </td>
                                                                <td class="border-0">
                                                                    <div class="cd-select">
                                                                        <select aria-label="Select Payment"
                                                                            class="select-filter seccolor"
                                                                            name="payMethod">
                                                                            <option value="all">Select Payment Method
                                                                            </option>
                                                                            <option value="ssl">SSL Commerz
                                                                            </option>
                                                                            <option value="fund">My Fund
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-0 seccolor">Additional Notes</td>
                                                                <td class="border-0">
                                                                    <div class="form-group">
                                                                        <textarea name="notes" class="form-control" rows="3"
                                                                            placeholder="You can enter any additional notes or information you want included with your order here..."></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <input type="hidden" value="{{ $quantity ?? '0' }}"
                                                                name="numberOfQuantity">
                                                            <input type="hidden" value="{{ $product->id }}"
                                                                name="productId">
                                                        </tbody>
                                                    </table>
                                                    <button type="submit" id="btnCompleteOrder"
                                                        class="btn btn-default-yellow-fill mb-1 disable-on-click spinner-on-click ">Complete
                                                        Order <i class="fas fa-arrow-alt-circle-right"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
