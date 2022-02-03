<x-guest-layout>

    <div class="login--container">

        <div class="login--logo">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 123.05 123.02">
			<path d="M118.16,37.56a61.55,61.55,0,0,0-113.34,0A61.52,61.52,0,0,0,61.53,123,61.59,61.59,0,0,0,118.2,85.43a61.25,61.25,0,0,0,0-47.87Zm-17.72,62.88A55.07,55.07,0,1,1,22.56,22.56a55.07,55.07,0,1,1,77.88,77.88Z" fill="#161B1F"/>
			<path d="M61.5,18.7a42.91,42.91,0,0,0-14.27,83.37A9.22,9.22,0,0,0,59.51,93.8V79.36C46.82,78.13,38.35,65.29,42.12,52.89l4.45-14.66a3.53,3.53,0,0,1,3.37-2.51H73.09a3.5,3.5,0,0,1,3.37,2.51l4.45,14.66c3.77,12.4-4.72,25.24-17.39,26.47V93.8A9.21,9.21,0,0,0,75.87,102,42.9,42.9,0,0,0,61.5,18.7Z" fill="#161B1F"/>
			<path d="M74.91,68.86a16.89,16.89,0,0,0,2.66-14.18c-4.26,6.92-15.21,7-23.77,3.84a13.35,13.35,0,0,0-8.93-.29,16.94,16.94,0,0,0,3.2,10.63,16.35,16.35,0,0,0,12.82,6.91h1.18A16.43,16.43,0,0,0,74.91,68.86Z" fill="#161B1F"/>
			</svg>
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
                <input id="email" type="email" name="email" :value="old('email')" class="login--input" placeholder="{{ __('messages.login_label_for_email') }}"/>
            </div>
            <div>
                <input id="password" type="password" name="password" class="login--input" placeholder="{{ __('messages.login_label_for_password') }}"/>
            </div>
            <div class="login--button">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('messages.login_link_forgot_password') }}
                    </a>
                @endif
                <button>{{ __('messages.login_button_login') }}</button>
            </div>

        </form>
        
        <span>{{ __('messages.login_span_or_register_text') }}</span>
        <a href="{{ route('register') }}"><button>{{ __('messages.login_button_register') }}</button></a>

    </div>

</x-guest-layout>
