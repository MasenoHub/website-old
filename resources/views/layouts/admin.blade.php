<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Admin | {{ config('app.name', 'Maseno Hub') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Accept-CH" content="DPR,Width,Viewport-Width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
    <style>
        /* HACK Workaround for datatable search bar */
        #content>div>div>div.flex-1.flex.flex-col.bg-blue-50.py-4.lg\:py-8.px-4.lg\:px-6.xl\:px-8.overflow-hidden>div.flex-1.py-4.lg\:py-10>div>div>div>div.flex.justify-between.items-center.mb-1>div.flex-grow.h-10.flex.items-center>div>div>input {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    </style>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans">
    <div id="content">
        <div>
            <div
                class="flex flex-col lg:flex-row min-h-screen font-semibold text-blue-900 text-base subpixel-antialiased">

                {{-- Mobile Bar --}}
                <div class="bg-blue-900 py-2 px-4 flex items-center justify-between lg:hidden text-blue-100">
                    <button id="menuToggle" class="flex p-2 rounded-lg">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <a href="#" class="block -mr-8">
                        <span class="sr-only">Maseno Hub Admin</span>
                        {{-- TODO Text Color --}}
                        <x-jet-application-logo class="w-40" />
                    </a>
                    <button
                        class="flex flex-row items-center justify-center xl:justify-start space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                        <span class="font-bold text-blue-100 text-xs">{{ Auth::user()->name }}</span>
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="w-10 h-10 rounded-full">
                    </button>
                </div>

                {{-- Sidebar --}}
                <div id="menu"
                    class="bg-white w-54 xl:w-64 2xl:w-80 px-4 lg:px-6 xl:px-8 py-4 lg:py-6 sticky top-0 hidden lg:flex flex-col shadow-inner h-screen border-l-8 border-blue-900 z-10">

                    {{-- Menu and logo --}}
                    {{-- TODO Scroll --}}
                    <div class="flex-1 py-4">
                        <a href="#" class="hidden md:block">
                            <span class="sr-only">Maseno Hub Admin</span>
                            <x-jet-application-logo class="w-40" />
                        </a>

                        <x-admin.navigation-menu />
                    </div>

                    {{-- Profile link --}}
                    <button
                        class="hidden md:flex w-full xl:w-auto flex-col xl:flex-row items-center justify-center xl:justify-start space-y-4 xl:space-y-0 xl:space-x-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60 absolute left-0 xl:left-8  bottom-6">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                            class="w-14 h-14 rounded-full">
                        <div class="flex flex-col items-center xl:items-start  text-sm">
                            <span class="font-bold text-blue-900 ">{{ Auth::user()->name }}</span>
                            <span class="font-bold text-sm text-blue-800 opacity-50">View profile</span>
                        </div>
                    </button>

                </div>

                <div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

                    {{-- Top Bar --}}
                    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
                        <div class="hidden md:block">
                            <h1 class="text-2xl mb-1 font-bold text-blue-800">Welcome, {{ Auth::user()->name }}!</h1>
                            <p class="text-lg text-blue-900 hidden lg:block">@yield('title')</p>
                        </div>
                        <div class="flex space-x-4 flex-1 justify-between md:justify-end">
                            <div class="relative md:max-w-xs w-full">
                                <i class="fas fa-search w-5 h-5 absolute top-3 left-3 text-blue-900 opacity-70"></i>
                                <input type="text"
                                    class="bg-white rounded-lg w-full h-10 pr-4 pl-9 placeholder-blue-900 placeholder-opacity-70 text-blue-900 text-sm font-semibold  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60"
                                    placeholder="Enter your search term...">
                            </div>
                            <div class="flex space-x-4">
                                <button type="button"
                                    class="bg-white rounded-lg h-10 px-3 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60">
                                    <i class="fas fa-envelope text-lg text-blue-900 opacity-80"></i>
                                </button>
                                <button type="button"
                                    class="bg-white rounded-lg h-10 px-3 hover:bg-gray-50 focus:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-60 relative">
                                    <i class="fas fa-bell text-lg text-blue-900 opacity-80"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Main Content --}}
                    <div class="flex-1 py-4 lg:py-10">
                        <div class="max-w-screen-2xl mx-auto">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>


            <script>
                // Toggle mobile menu
                const button = document.getElementById('menuToggle');
                const menu = document.getElementById('menu');
                const body = document.getElementsByTagName('body')

                button.onclick = function (event) {
                    event.preventDefault();
                    menu.classList.toggle('hidden')
                    body[0].classList.toggle('overflow-hidden')
                }
            </script>
        </div>
    </div>

    @livewireScripts
</body>

</html>