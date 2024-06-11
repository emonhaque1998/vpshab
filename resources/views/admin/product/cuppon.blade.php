<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Cuppon Genarator" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Cuppon Genarator</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" id="cupponSubmitForm">
                                @csrf
                                <div class="col-12">
                                    <label for="name" class="form-label">Cuppon Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Cuppon Name">
                                </div>
                                <div class="col-12">
                                    <label for="discount" class="form-label">Cuppon Discount</label>
                                    <input type="number" id="discount" name="discount" class="form-control" placeholder="Cuppon Discount">
                                </div>
                                <div class="col-12">
                                    <label for="validity" class="form-label">Cuppon Validate</label>
                                    <input type="number" id="validity" name="validity" class="form-control" placeholder="Cuppon Validate">
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <x-submit btnId="cupponSubmitBtn" btnText="Add Cuppon" />
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
                                        @isset($cuppons)
                                            @foreach ($cuppons as $key => $cuppon)
                                                <tr>
                                                    <td>#{{ ++$key }}</td>
                                                    <td>{{ $cuppon->name }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="javascript:;" class="text-danger" data="{{ $cuppon->id }}" onclick="deleteISP(event)"
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
                            {{ $cuppons->links('vendor.pagination.default') }}
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
