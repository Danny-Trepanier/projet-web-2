<x-guest-layout>

    <img src="{{ asset('img/logo-vino-noir.png') }}" alt="Logo du site Vino en noir" class="logo-noir">
    <h1>Vino</h1>

    @if (session('status'))
        <div class="status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="connexion--login-container">
            <h2>Log in</h2>
            <x-jet-validation-errors id="email" class="error"/>
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" type="email" name="email" :value="old('email')"/>
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" name="password"/>
            </div>
            <div>
                <label for="remember_me">
                    <x-jet-checkbox id="remember_me" name="remember"/>
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>

        <div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-jet-button class="button">
                {{ __('Log in') }}
            </x-jet-button>

            <span>or register : </span>
            <x-jet-button class="button">
                <a href="{{ route('register') }}">Register</a>
            </x-jet-button>
        </div>
    </form>

</x-guest-layout>
