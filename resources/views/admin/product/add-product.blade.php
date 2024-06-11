<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Add Product" />
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Product</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <form class="row g-3" action="{{ route('add-product.store') }}" method="POST"
                            id="addProductForm">
                            @csrf
                            <div class="col-12">
                                <label for="title" class="form-label">Product title</label>
                                <input type="text" class="form-control" placeholder="Product title" id="title"
                                    name="title" :value="old('title')">
                            </div>
                            <div class="col-12">
                                <label for="title" class="form-label">Product Stock</label>
                                <input type="number" class="form-control" placeholder="Product Stock" id="title"
                                    name="stock" :value="old('stock')">
                            </div>
                            <div class="col-12">
                                <label for="monthlyPrice" class="form-label">Monthly Price</label>
                                <input type="number" class="form-control" placeholder="Monthly Price" id="monthlyPrice"
                                    name="monthly_price">
                            </div>
                            <div class="col-12" style="display: none;" id="freshIPInput">
                                <label for="freshIP_amount" class="form-label">Fresh Ip Price</label>
                                <input type="number" class="form-control" placeholder="Fresh Ip Price" id="freshIP_amount"
                                    name="freshIP_amount">
                            </div>
                            <div class="col-12">
                                <label for="annualPrice" class="form-label">Annual Price</label>
                                <input type="number" class="form-control" placeholder="Annual Price" id="annualPrice"
                                    name="annual_price">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="discount">Discount</label>
                                <input type="text" class="form-control" placeholder="Discount" id="discount"
                                    name="discount">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="ram">Ram</label>
                                <input type="number" class="form-control" placeholder="Ram" id="ram"
                                    name="ram">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="disk">Disk</label>
                                <input type="number" class="form-control" placeholder="Disk" id="disk"
                                    name="disk">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="operatingSystem">Operating System</label>
                                <select class="form-select" id="operatingSystem" name="operating_system">
                                    <option>Windows 11</option>
                                    <option>Windows 10</option>
                                    <option>Linux</option>
                                    <option>Mac</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="bandwidth">Bandwidth</label>
                                <input type="number" class="form-control" placeholder="Bandwidth" id="bandwidth"
                                    name="bandwidth">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="virtualization">Virtualization</label>
                                <input type="text" class="form-control" placeholder="Virtualization"
                                    id="virtualization" name="virtualization">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="location">Location</label>
                                <select class="form-select" id="location" name="country_id">
                                    @isset($countries)
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="category">Category</label>
                                <select class="form-select" id="category" name="category_id">
                                    @foreach ($information as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="currency">Currency</label>
                                <select class="form-select" id="currency" name="currency">
                                    <option value="৳">BDT</option>
                                    <option value="$">Dollar</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="freshIp" name="freshIp">
                                    <label class="form-check-label" for="freshIp">
                                        Fresh Ip
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault" name="status">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Publish on website
                                    </label>
                                </div>

                            </div>

                            <div class="col-12">
                                <x-submit btnId="addProductSubmitBtn" btnText="Add Product" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</x-app-layout>
