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
        <div class="app__grid">
            <sidebar class="app_sidebar">
                <div class="cursor-pointer logo">
                    <a href="/">
                        <img src="https://assets.production.linktr.ee/b60f3801dc94ce954c3b4fd2fa051eb8c560f2ab/images/logo_trees.svg" alt="Linktree Symbol"></a>
                </div>
                <div class="cursor-pointer user">
                    <div class="avatar w-[40px] h-[40px] bg-slate-200 rounded-full"></div>
                </div>
            </sidebar>
            <main class="app__main">
                <header class="bg-white">
                    @include('layouts.navigation')
                </header>
                <div class="container h-full overflow-auto">
                    {{ $slot }}
                </div>
            </main>
            <sidebar class="app__preview">
                <header class="flex items-center justify-between px-4 bg-white h-14">
                    <div class="text-base font-medium">
                        My Linktree:
                        <a href="{{ route('user.show',['user' => auth()->user()]) }}">
                            {{ route('user.show',['user' => auth()->user()]) }}
                        </a>
                    </div>
                    <x-button>
                        Share
                    </x-button>
                </header>
            </sidebar>
        </div>
        @livewireScripts
    </body>
</html>
