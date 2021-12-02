<x-guest-layout>

    <div class="login--container">
        <img src="{{ asset('img/logo/logo-vino-noir.png') }}" alt="Logo du site Vino en noir" class="logo-noir">
        <h1>Vino</h1>

        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h2>{{ __('messages.login_title_page') }}</h2>
            <x-jet-validation-errors class="error"/>
            <div>
                <x-jet-label for="email" value="{{ __('messages.login_label_for_email') }}"/>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" class="login--input"/>
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('messages.login_label_for_password') }}" class="login--label"/>
                <x-jet-input id="password" type="password" name="password" class="login--input"/>
            </div>
            <div class="login--container-checkbox">
                <label for="remember_me">
                    <x-jet-checkbox id="remember_me" name="remember"/>
                    <span>{{ __('messages.login_remember_me_text') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('messages.login_link_forgot_password') }}
                </a>
                @endif

                <x-jet-button class="button">
                    {{ __('messages.login_button_login') }}
                </x-jet-button>

                <span>{{ __('messages.login_span_or_register_text') }}</span>
                <x-jet-button class="button">
                    <a href="{{ route('register') }}">{{ __('messages.login_button_register') }}</a>
                </x-jet-button>
            </div>
        </form>
    </div>

</x-guest-layout>
