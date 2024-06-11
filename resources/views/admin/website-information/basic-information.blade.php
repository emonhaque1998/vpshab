<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Basic Information" />
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <hr />
                        <form id="website_info_form" action="{{ route('basic-information.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Website Top
                                    Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEnterYourName" name="top_title"
                                        value="{{ $information->top_title ?? '' }}" placeholder="Enter Website Title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPhoneNo2"
                                        value="{{ $information->phone_number ?? '' }}" name="phone_number"
                                        placeholder="Phone No">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Facebook Link</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="inputPhoneNo2" name="facebook"
                                        value="{{ $information->facebook ?? '' }}" placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Youtube Link</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="inputPhoneNo2" name="youtube"
                                        value="{{ $information->youtube ?? '' }}" placeholder="Youtube Link">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Twiter Link</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="inputPhoneNo2"
                                        value="{{ $information->twiter ?? '' }}" name="twiter"
                                        placeholder="Twiter Link">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Instragram Link</label>
                                <div class="col-sm-9">
                                    <input type="url" class="form-control" id="inputPhoneNo2"
                                        value="{{ $information->instagram ?? '' }}" name="instagram"
                                        placeholder="Instragram Link">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Website Short About</label>
                                <div class="col-sm-9">
                                    <div class="input-group col-sm-9"> <span class="input-group-text">With
                                            textarea</span>
                                        <textarea name="wb_site_short_about" class="form-control" aria-label="With textarea">{{ $information->wb_site_short_about ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <x-submit btnId="website_info_submit_btn" btnText="Save" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
