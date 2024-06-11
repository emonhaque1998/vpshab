<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="All Users" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <div class="row align-items-center m-0">
                <div class="col-md-12 col-12 me-auto mb-md-0 mb-3">
                    <div class="row">
                        <form action="{{ url("admin/all-users") }}" method="POST">
                            @csrf
                            <div class="d-flex gap-2">
                                <input class="form-control" type="text" name="searchText">
                                <input type="submit" value="Filter" class="btn btn-primary">

                                <a class="btn btn-success" href="{{ route("all-users.index") }}">Refresh</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-striped">
                    <tbody id="allUsers">
                        {{-- @unless (!$information)
                            <h1 class="text-center mt-5">No Product Found</h1>
                        @endunless --}}
                        @isset($users)
                            @foreach ($users as $user)
                                <tr>
                                    <td class="productlist">
                                        <a class="d-flex align-items-center gap-2" href="{{ url("admin/user-profile/$user->email") }}">
                                            <div>
                                                <h6 class="mb-0 product-title">{{ $user->name }}</h6>
                                            </div>
                                        </a>
                                    </td>
                                    <td><span>{{ $user->email }}</span></td>

                                    <td><span>{{ $user->created_at->format("d-m-Y") }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="#" id="userDeletd" data={{ $user->id }}
                                                class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="" data-bs-original-title="Delete" aria-label="Delete"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>

            {{ $users->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
