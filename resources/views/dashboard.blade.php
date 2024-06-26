<x-app-layout>
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Orders</p>
                            <h4 class="mb-0">${{ $orders->sum("amount") }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>22.5% from last week</span>
                            </p>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-basket2"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Income</p>
                            <h4 class="mb-0">${{ $orders->where("status", "Successfull")->sum("amount") }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span>
                            </p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Visitor</p>
                            <h4 class="mb-0">{{ $visitorCount ?? '0' }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>{{ $increaseVisitor ?? "0" }}% from last week</span>
                            </p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                            <i class="bi bi-emoji-heart-eyes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">New Clients</p>
                            <h4 class="mb-0">{{ $totalClient ?? '0' }}</h4>
                            <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>{{ $increaseUser ?? "0" }}% from last week</span>
                            </p>
                        </div>
                        <div class="ms-auto widget-icon bg-info text-white">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end row-->
</x-app-layout>
