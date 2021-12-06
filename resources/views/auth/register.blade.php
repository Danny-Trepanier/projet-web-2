<x-guest-layout>

    <div class="title">
        <h1>{{ __('messages.register_title_page') }}</h1>
    </div>
    
    <div class="register--container">

        <form method="POST" action="{{ route('register') }}">

        @csrf

            <x-jet-validation-errors/>

            <div>
                <label for="name">{{ __('messages.register_label_for_name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            </div>
            <div>
                <label for="email">{{ __('messages.register_label_for_email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')"/>
            </div>
            <div>
                <label for="password">{{ __('messages.register_label_for_password') }}</label>
                <input id="password" type="password" name="password" autocomplete="new-password" />
            </div>
            <div>
                <label for="password_confirmation">{{ __('messages.register_label_for_password_repeat') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div>
                <label for="terms">
                    <div>
                        <input type="checkbox" name="terms" id="terms"/>

                        <div>
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                        </div>
                    </div>
                </label>
            </div>
            @endif

            <div class="register--already-registered">
                <a href="{{ route('login') }}">
                    {{ __('messages.register_link_already_registered') }}
                </a>

                <button class="button">
                    {{ __('messages.register_button_register') }}
                </button>
            </div>

        </form>

    </div>

</x-guest-layout>
