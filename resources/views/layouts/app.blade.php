@php $locale = session()->get('locale'); @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ url('img/favicon/favicon.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Martel&family=Montserrat:wght@700&family=Roboto+Condensed&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>

        <button class="menu--burger">
            <span class="menu--burger-bar"></span>
        </button>
        <nav class="navbar">
            <ul class="navbar--links">
                <li class="navbar--link"><a href="{{ route('cellar') }}">{{ __('messages.menu_link_my_cellars') }}</a></li>
                <li class="navbar--link"><a href="{{ route('bottle') }}">{{ __('messages.menu_link_bottles') }}</a></li>
                <li class="navbar--link"><a href="{{ route('profile.show') }}">{{ __('messages.menu_link_my_account') }}</a></li>
                <li class="navbar--link">
                    <form method="POST" action="{{ route('logout') }}" class="navbar--link-button">
                        @csrf
                        <button class="red">{{ __('messages.menu_link_logout') }}</button>
                    </form>
                </li>
                @if($locale == 'fr')
                    <li><a href="{{ url("") }}/lang/en" class="navbar--link-lang">{{ __('messages.menu_link_english') }}</a></li>
                @else
                    <li><a href="{{ url("") }}/lang/fr" class="navbar--link-lang">{{ __('messages.menu_link_french') }}</a></li>
                @endif
                <img src="{{ asset('img/logo/logo-vino-blanc.png') }}" alt="Logo du site Vino en blanc" class="navbar--logo-blanc">
            </ul>
        </nav>

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
