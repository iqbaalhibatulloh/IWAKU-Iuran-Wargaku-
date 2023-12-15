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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        {{-- carrosel --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-[#EDF1D6]">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="grid grid-cols-4 grid-rows-2 p-20 pb-0 gap-x-20 text-white text-2xl">
                    @if(!\Route::is('profile.edit', 'payment.detailPayment', 'payment.opsiPayment', 'memberList.editMemberList', 'document.docPemasukan'))
                    <div class="bg-[#8D7B68] max-h-max h-64 text-lg rounded-xl">
                        @include('components.side-bar')

                        <div class="bg-[#8D7B68] max-h-max h-80 rounded-xl grid-rows text-black text-lg mt-10 ">
                            <div class="">
                                @include('components.sidePage')
                            </div>
                        </div>
                    </div>
                    

                    @endif
                    <div class="bg-[#8D7B68] {{ !\Route::is('profile.edit', 'payment.detailPayment', 'payment.opsiPayment', 'memberList.editMemberList', 'document.docPemasukan' ) ? "col-span-3" : "col-span-4" }} min-h-max max-h-max grid grid-cols-3 gap-8 rounded-xl py-px shadow-5xl">
                        @yield('content')
                    </div>
                    
                    
                   </div>
            </main>
            @include('layouts.footer')
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js "></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            new DataTable('#example1');
            new DataTable('#example2');
            new DataTable('#example3');
            new DataTable('#example4');
        </script>\
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    </body>
</html>
