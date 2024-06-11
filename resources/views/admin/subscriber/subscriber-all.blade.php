<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="All Subscribe" />
    <!--end breadcrumb-->

    <div class="card">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-striped">
                    <tbody id="allProuctBody">
                        {{-- @unless (!$information)
                            <h1 class="text-center mt-5">No Product Found</h1>
                        @endunless --}}
                        @isset($subcribers)
                            @foreach ($subcribers as $subcriber)
                                <tr>
                                    <td><span>{{ $subcriber->email }}</span></td>

                                    <td><span>{{ $subcriber->created_at->format("d-m-Y") }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3 fs-6">
                                            <a href="{{ url('admin/products/all-products/') }}" id="productDelete"
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

            {{ $subcribers->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
