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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body{
                background-color: #EDF1D6;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased body">
        <div class="min-h-screen flex flex-col bg-[#EDF1D6] sm:justify-center items-center  dark:bg-[#EDF1D6]">
            {{-- <div>
                
                <img class="-mb-20" src="./IwaKu!-black.png" alt="IwaKu!">
            </div> --}}

            <div class="w-full sm:max-w-md  px-6 py-4 bg-white dark:bg-white shadow-md overflow-hidden sm:rounded-lg border-2 border-gray-500">
                {{ $slot }}
            </div>
        </div>
        @stack('js')
    </body>
</html>
