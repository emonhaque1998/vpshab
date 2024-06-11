<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Vps State" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Product Country</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('category.index') }}" method="POST"
                                id="countrySubmitForm">
                                @csrf
                                <div class="col-12">
                                    <label for="countryName" class="form-label">Country Name</label>
                                    <input type="text" id="countryName" class="form-control"
                                        placeholder="Country Name" name="name">
                                </div>
                                <div class="col-12">
                                    <label for="verticalAlign" class="form-label">Vertical Align</label>
                                    <input type="range" class="form-range" id="verticalAlign" name="vertical">
                                </div>
                                <div class="col-12">
                                    <label for="horizontalAlign" class="form-label">Horizontal Align</label>
                                    <input type="range" class="form-range" id="horizontalAlign" name="horizontal">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <x-submit btnId="btnCountrySubmit" btnText="Add Country" />
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
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="countryList">
                                        @isset($countris)
                                            @foreach ($countris as $key => $country)
                                                <tr>
                                                    <td>#{{ ++$key }}</td>
                                                    <td>{{ $country->name }}</td>
                                                    <td>54</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="javascript:;" class="text-danger" data="{{ $country->id }}" onclick="deleteCountry(event)"
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
                            {{ $countris->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteCountry(event) {
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
                    try{
                        const response = await axios.delete(
                            `country/${event.target.parentElement.attributes.data.value}`
                        );

                        if (response.status === 200) {
                            event.target.parentElement.parentElement.parentElement.parentElement.remove();
                            Swal.fire({
                                title: "Deleted!",
                                text: response.data.message,
                                icon: "success",
                            });
                        }else{
                            Swal.fire({
                                title: "Problem!",
                                text: response.data.message,
                                icon: "error",
                            });
                        }
                    }catch (error) {
                        Swal.fire({
                            icon: "error",
                            text: error.response.data.message,
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000, // Adjust the time the toast is displayed (in milliseconds)
                        });
                    }
                }
            });
        }
    </script>
</x-app-layout>
