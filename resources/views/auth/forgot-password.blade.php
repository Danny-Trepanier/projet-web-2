<x-guest-layout>

        <div class="password--forgot">
            <div>{{ __('messages.forgot_passport_text') }}</div>
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors/>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email" value="{{ __('Email') }}" />
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div>
                    <button>
                        {{ __('messages.forgot_passport_button') }}
                    </button>
                </div>
            </form>
        </div>

</x-guest-layout>
