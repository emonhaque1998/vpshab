<x-app-layout>
    <!--breadcrumb-->
    <x-breadcrumb pageName="Page" />
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Page Information</h5>
                        </div>
                        <hr />
                        <form id="website_page_vedio_form" action="{{ route('page-information.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="buttonFirst" class="col-sm-3 col-form-label">All Pages Subtitle</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="buttonFirst"
                                        value="{{ $information ? $information->pageSubTitle : null }}"
                                        name="pageSubTitle" placeholder="Page Sub Title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="buttonFirst" class="col-sm-3 col-form-label">Upload Page Video</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="buttonFirst" name="videoUrl"
                                        placeholder="Page Vedio">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <x-submit btnId="website_page_vedio_submitBtn" btnText="Save" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
