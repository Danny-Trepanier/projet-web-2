@if (session('status'))
    <div class="">
        {{ session('status') }}
    </div>
@endif

<img src="/storage/logo-vino-noir.svg" alt="Logo du site Vino" class="logo">
<h1>Vino</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <div class="">
        <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />
    </div>

    <div>
        <label for="remember_me">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span>{{ __('Remember me') }}</span>
        </label>
    </div>

    <div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-jet-button>
            {{ __('Log in') }}
        </x-jet-button>
    </div>
</form>



