<x-home-layout>
    <section style="margin-top: 110px; height: 400px"
        class="config cd-main-content pb-80 blog sec-bg2 motpath notoppadding bg-seccolorstyle d-flex align-items-center">
        <div class="container">
            <div class="background_right p-5 mt-5">
                <div class="mb-4 text-light">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="text-center">
                    @csrf
            
                    <!-- Password Reset Token -->
                    <input class="form-control" type="hidden" name="token" value="{{ $request->route('token') }}">
            
                    <!-- Email Address -->
                    <div class="d-flex justify-content-center">
                        <x-text-input id="email" class="form-control w-50 block mt-1" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4 d-flex justify-content-center">
                        <x-text-input placeholder="Password" id="password" class="form-control block mt-1 w-50" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4 d-flex justify-content-center">
                        
                        <x-text-input id="password_confirmation" placeholder="Confirmation Password" class="form-control block mt-1 w-50"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>

</x-home-layout>

