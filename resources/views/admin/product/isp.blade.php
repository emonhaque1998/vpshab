<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="ISP & Loction" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add ISP & Location</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('isp.store') }}" method="POST" id="ispSubmitForm">
                                @csrf
                                <div class="col-12">
                                    <label for="countryName" class="form-label">Isp Name</label>
                                    <input type="text" id="countryName" class="form-control" placeholder="Isp Name"
                                        name="name">
                                </div>
                                <div class="col-12">
                                    <label for="countryName" class="form-label">Location</label>
                                    <select name="country_id" id="" class="form-control">
                                        <option value="0">-- Select Location --</option>
                                        @isset($countries)
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <x-submit btnId="ispSubmitBtn" btnText="Add Isp" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ispListed">
                                        @isset($isps)
                                            @foreach ($isps as $key => $isp)
                                                <tr>
                                                    <td>#{{ ++$key }}</td>
                                                    <td>{{ $isp->name }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="javascript:;" class="text-danger" data="{{ $isp->id }}" onclick="deleteISP(event)"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="" data-bs-original-title="Delete"
                                                                aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                            {{ $isps->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteISP(event) {
            try {
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        const response = await axios.delete(
                            `isp/${event.target.parentElement.attributes.data.value}`
                        );

                        if (response.status === 200) {
                            event.target.parentElement.parentElement.parentElement.parentElement.remove();
                            Swal.fire({
                                title: "Deleted!",
                                text: response.data.message,
                                icon: "success",
                            });
                        }
                    }
                });
            } catch (error) {
                this.toast(error.response.data.message, "error");
            }
        }
    </script>
</x-app-layout>
