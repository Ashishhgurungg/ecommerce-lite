<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hello</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <header>
        <nav class="flex justify-between items-center px-6 py-3 border-b">
            <div class="flex items-center gap-6">
                <a href="/">
                    <img src="{{ asset('images/my-logo.svg') }}" 
                        alt="My Logo" 
                        class="block h-6 w-auto text-gray-800 dark:text-gray-200" />
                </a>
                <a href = "" class="hover:text-blue-600">
                    Articles
                </a>
                <a href = "" class = "hover:text-blue-600">
                    About
                </a>
                <a href = "" class="hover:text-blue-600">
                    Gallery
                </a>
                <a href = "" class="hover:text-blue-600">
                    Contact
                </a>
                <a href = "" class="hover:text-blue-600">
                    FAQ
                </a>
            </div>

             @if (Route::has('login'))
             <div class="flex items-center space-x-3">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
                @endif
        </nav>
           
        </header>

        @if (Route::has('login'))
            <div></div>
        @endif
    </body>
</html>
