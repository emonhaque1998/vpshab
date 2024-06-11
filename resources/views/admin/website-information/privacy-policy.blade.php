<x-app-layout>
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <!--breadcrumb-->
    <x-breadcrumb pageName="Privacy Policy" />
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Privacy Policy</h5>
                        </div>
                        <hr />
                        <form id="website_privacy_form" action="{{ route('update-privacy-policy.store') }}"
                            method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEnterYourName"
                                        name="privacyTitle" value="{{ $privacy->privacy_title ?? '' }}"
                                        placeholder="Title">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="from-group">
                                    <textarea class="form-control" id="editor" name="privacyEditor">{{ $privacy->privacy_body ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9">
                                    <x-submit btnId="website_privacy_btn" btnText="Update Site" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script>
    // Initialize Summernote
    $(document).ready(function() {
        $('#editor').summernote({
            height: 300, // Set the height of the editor
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']], // Formatting buttons
                ['insert', ['link']], // Insert buttons
                ['view', ['fullscreen', 'codeview']] // View buttons
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    // When content changes
                    $('#editor').find('b').addClass('golink');
                },
                onBlur: function() {
                    // When the editor loses focus
                    $('#editor').find('b').addClass('golink');
                }
            }
        });
    });
</script>
