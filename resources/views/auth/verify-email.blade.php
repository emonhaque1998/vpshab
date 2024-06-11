<x-home-layout>
    <section style="margin-top: 110px; height: 400px"
        class="config cd-main-content pb-80 blog sec-bg2 motpath notoppadding bg-seccolorstyle d-flex align-items-center">
        <div class="container">
            <div class="background_right p-5 mt-5">
                <div class="mb-4 text-light">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-info text-center">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}" class="text-center mb-3">
                        @csrf

                        <div>
                            <button type="submit" class="btn btn-info bg-info">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="text-center">
                        @csrf

                        <button type="submit" class="btn btn-danger bg-danger px-3 py-2 text-light">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-home-layout>
