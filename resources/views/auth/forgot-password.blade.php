<x-home-layout>
    <section style="margin-top: 110px; height: 400px"
        class="config cd-main-content pb-80 blog sec-bg2 motpath notoppadding bg-seccolorstyle d-flex align-items-center">
        <div class="container">
            <div class="background_right p-5 mt-5">
                <div class="mb-4 text-light">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="d-flex justify-content-center">
                        <x-text-input id="email" class="block mt-1 w-50 form-control" type="email" name="email" :value="old('email')" required
                            autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4 text-center">
                        <x-primary-button class="btn btn-danger">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>

</x-home-layout>

