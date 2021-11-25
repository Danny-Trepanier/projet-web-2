<x-guest-layout>

    <div class="register--container">

        <form method="POST" action="{{ route('register') }}">

        @csrf

            <h1>M'inscrire</h1>
            <x-jet-validation-errors/>

            <div>
                <x-jet-label for="name" value="{{ __('Name') }} *"/>
                <x-jet-input id="name" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }} *" />
                <x-jet-input id="email" type="email" name="email" :value="old('email')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }} *" />
                <x-jet-input id="password" type="password" name="password" autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }} *" />
                <x-jet-input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div>
                <x-jet-label for="terms">
                    <div>
                        <x-jet-checkbox name="terms" id="terms"/>

                        <div>
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="register--already-registered">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="button">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

        </form>

    </div>

</x-guest-layout>
