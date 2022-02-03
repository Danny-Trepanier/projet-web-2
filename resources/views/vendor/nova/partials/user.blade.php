<dropdown-trigger class="h-9 flex items-center">
    @isset($user->email)
        <img
            src="https://secure.gravatar.com/avatar/{{ md5(\Illuminate\Support\Str::lower($user->email)) }}?size=512"
            class="rounded-full w-8 h-8 mr-3"
        />
    @endisset

    <span class="text-90">
        {{ $user->name ?? $user->email ?? __('Nova User') }}
    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        @php $locale = session()->get('locale'); @endphp
        @if($locale == 'fr')
            <li><a href="{{ url("") }}/lang/en" class="block no-underline text-90 hover:bg-30 p-3">{{ __('messages.menu_link_english') }}</a></li>
        @else
            <li><a href="{{ url("") }}/lang/fr" class="block no-underline text-90 hover:bg-30 p-3">{{ __('messages.menu_link_french') }}</a></li>
        @endif
        <li>
            <a href="{{ route('nova.logout') }}" class="block no-underline text-90 hover:bg-30 p-3">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</dropdown-menu>
