<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Map Information" />
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Map Information</h5>
                        </div>
                        <hr />
                        <form id="website_map_form" action="{{ route('banner-information.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="buttonFirst" class="col-sm-3 col-form-label">Enter Map Subtitle</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="buttonFirst"
                                        value="{{ $information->sub_title ?? '' }}" name="sub_title"
                                        placeholder="Map Sub-Title">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <x-submit btnId="website_map_submit" btnText="Save" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
