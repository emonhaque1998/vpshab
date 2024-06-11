<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Banner" />
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Banner Information</h5>
                        </div>
                        <hr />
                        <form id="website_banner_form" action="{{ route('banner-information.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="bannerTitle" class="col-sm-3 col-form-label">Enter Banner Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bannerTitle" name="title"
                                        value="{{ $information->title ?? '' }}" placeholder="Enter Banner Title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="buttonFirst" class="col-sm-3 col-form-label">First Button Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="buttonFirst"
                                        value="{{ $information->btn1_name ?? '' }}" name="btn1_name"
                                        placeholder="Button name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="buttonSecond" class="col-sm-3 col-form-label">Second Button Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="buttonSecond"
                                        value="{{ $information->btn2_name ?? '' }}" name="btn2_name"
                                        placeholder="Button name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Banner Discription</label>
                                <div class="col-sm-9">
                                    <div class="input-group col-sm-9"> <span class="input-group-text">With
                                            textarea</span>
                                        <textarea name="discription" class="form-control" aria-label="With textarea">{{ $information->discription ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <x-submit btnId="website_banner_submit_btn" btnText="Save" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
