<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiase">
        <div class="theme {{ $user->theme->themeClass }}__theme">
            <div class="theme__avatar"></div>
            <div class="theme__info">
                <div class="theme__username">{{ '@'.$user->user_name }}</div>
                <p class="theme__bio">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, animi assumenda debitis dolor, eligendi enim eveniet libero minus natus neque nostrum porr
                </p>
            </div>
            <ul class="theme__links">
                @foreach ($user->links->sortByDesc('created_at') as $link)

                <li class="theme__links-item">
                    <a href="{{ $link->link }}" class="theme__links-button {{ $user->theme->buttonTypeClass }}  rounded-{{ $user->theme->button_radius_size }}">
                        @if($link->thumbnail)
                            <div class="w-8 h-8 rounded-full">
                                <img class="object-cover w-full h-full rounded-full" src="{{ $link->thumbnail }}" alt="">
                            </div>
                        @endif
                        <span class="theme__links-text">
                            {{ $link->name }}
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @livewireScripts
    </body>
</html>
