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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>

        <button class="menu--burger">
            <span class="menu--burger-bar"></span>
        </button>
        <nav class="navbar">
            <ul class="navbar--links">
                @if($locale == 'fr')
                    <li><a href="{{ url("") }}/lang/en" class="navbar--link-lang">{{ __('messages.menu_link_english') }}</a></li>
                @else
                    <li><a href="{{ url("") }}/lang/fr" class="navbar--link-lang">{{ __('messages.menu_link_french') }}</a></li>
                @endif
                <img src="{{ asset('img/logo/logo-vino-blanc.png') }}" alt="Logo du site Vino en blanc" class="navbar--logo-blanc">
            </ul>
        </nav>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

    </body>
</html>
