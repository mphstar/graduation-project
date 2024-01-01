<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 sm:pt-0 bg-gray-50">
        <div class="overflow-hidden relative z-20">
            <img class="fixed translate-x-[300px] md:translate-x-0 z-10 right-0 bottom-0" src="/assets/images/img1.png"
                alt="img">
            <img class="fixed -translate-x-[300px] md:translate-x-0 z-10 left-0 top-0" src="/assets/images/img2.png" alt="img">
        </div>
        <div>
            {{-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> --}}

        </div>
        

        <div class="w-[90%] sm:max-w-md mt-6 px-6 py-4 min-h-full bg-white drop-shadow-xl overflow-hidden sm:rounded-lg z-20">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
