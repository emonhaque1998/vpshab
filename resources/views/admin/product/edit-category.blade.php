<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Edit Category" />
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add Product Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 d-flex">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            @isset($category)
                                <form class="row g-3"
                                    action="{{ url("/admin/products/category/$category->category_slug ?? null") }}"
                                    method="POST" id="categoryUpdateSubmitForm">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-12">
                                        <label for="categoyName" class="form-label">Name</label>
                                        <input type="text" id="categoyName" class="form-control"
                                            value="{{ $category == null ? null : $category->category_name }}"
                                            placeholder="Category name" name="category_name">
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <x-submit btnId="btnCategorySubmit" btnText="Update Category" />
                                        </div>
                                    </div>
                                </form>
                            @endisset
                        </div>
                    </div>
                </div>

            </div><!--end row-->
        </div>
    </div>
</x-app-layout>
