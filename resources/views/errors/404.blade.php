@extends('errors::minimal')

@section('title', __('Not Found'))
@section('message')
    <div class="py-5 ">
        <div class="row g-0">
            <div class="col col-xl-5">
                <div class="card-body p-4">
                    <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span
                            class="text-success">4</span></h1>
                    <h2 class="font-weight-bold display-4">Lost in Space</h2>
                    <p>You have reached the edge of the universe.
                        <br>The page you requested could not be found.
                        <br>Dont'worry and return to the previous page.
                    </p>
                    <div class="mt-5"> <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-md-5 radius-30">Go
                            Home</a>
                        <a onclick="goBack()" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <img src="{{ asset('admin/assets/images/error/404-error.png') }}" class="img-fluid" alt="">
            </div>
        </div>
        <!--end row-->

    </div>
@endsection

<script>
    function goBack() {
        window.history.back();
    }
</script>
