<x-guest-layout>

    <div class="login--container">

        <div class="login--logo">
            <img src="{{ asset('img/logo/logo-vino-noir.png') }}" alt="Logo du site Vino en noir">
            <h1>Vino</h1>
        </div>

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
                <label for="email" value="{{ __('messages.login_label_for_email') }}">
                <input id="email" type="email" name="email" :value="old('email')" class="login--input"/>
            </div>
            <div>
                <label for="password" value="{{ __('messages.login_label_for_password') }}" class="login--label">
                <input id="password" type="password" name="password" class="login--input"/>
            </div>
            <div class="login--container-checkbox">
                <label for="remember_me">
                    <input type="checkbox" id="remember_me" name="remember"/>
                    <span>{{ __('messages.login_remember_me_text') }}</span>
                </label>
            </div>
            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('messages.login_link_forgot_password') }}
                    </a>
                @endif
                <button>{{ __('messages.login_button_login') }}</button>
                <span>{{ __('messages.login_span_or_register_text') }}</span>
                <button>
                    <a href="{{ route('register') }}">{{ __('messages.login_button_register') }}</a>
                </button>
            </div>

        </form>

    </div>

</x-guest-layout>
