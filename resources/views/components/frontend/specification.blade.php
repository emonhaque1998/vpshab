<section id="specs" class="sec-normal sec-bg1 bg-colorstyle pb-80">
    <div class="best-plans pricing">
        <div class="container">
            <div class="randomline">
                <div class="bigline"></div>
                <div class="smallline"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="section-heading mergecolor">VPS Server Technical Specifications</h2>
                    <p class="section-subheading mergecolor">Choose us and optimize your workflow</p>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive-lg">
                        <table class="table sample mt-5">
                            <thead>
                                <tr class="seccolor">
                                    <td scope="col" class="title">Features</td>
                                    <td scope="col" class="title">Performance</td>
                                    <td scope="col" class="title">Boosters</td>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($specifications)
                                    @foreach ($specifications as $specification)
                                        <tr>
                                            <td>
                                                <div class="title-table" data-bs-toggle="popover"
                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                    data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                    <span class="fas fa-check-circle me-2"></span>
                                                    {{ $specification->features }}
                                                </div>
                                            </td>
                                            <td><span class="fas fa-check-circle me-2"></span>
                                                {{ $specification->performance }}</td>
                                            <td><span class="fas fa-check-circle me-2"></span>
                                                {{ $specification->boosters }}</td>
                                        </tr>
                                    @endforeach
                                @endisset

                                <tr>
                                    <td class="border-0"><a href="#"
                                            class="btn btn-default-grad-purple-fill">All Specs</a></td>
                                    <td class="border-0"><a href="#"
                                            class="btn btn-default-grad-purple-fill">All Specs</a></td>
                                    <td class="border-0"><a href="#"
                                            class="btn btn-default-grad-purple-fill">All Specs</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
