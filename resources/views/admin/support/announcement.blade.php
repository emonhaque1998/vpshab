<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Announcement" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Post Announcement</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" method="POST"
                                id="announcementSubmitForm">
                                @csrf
                                <div class="col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" class="form-control"
                                        placeholder="Title" name="title">
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label><br>
                                    <textarea placeholder="Description" class="w-100" name="description"></textarea>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <x-submit btnId="announcementSubmitBtn" btnText="Post Announcement" />
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
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="postAnnouncementList">
                                        @isset($information)
                                            @foreach ($information as $key => $announcement)
                                                <tr>
                                                    <td>#{{ ++$key }}</td>
                                                    <td>{{ $announcement->title }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3 fs-6">
                                                            <a href="javascript:;" class="text-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                data="{{ $announcement->id }}"
                                                                onclick="deleteAnnouncement(event)"
                                                                title=""
                                                                data-bs-original-title="Delete" aria-label="Delete"><i
                                                                    class="bi bi-trash-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                            {{ $information->links('vendor.pagination.default') }}
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteAnnouncement(event) {
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
                            `announcement/${event.target.parentElement.attributes.data.value}`
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
