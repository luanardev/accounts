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
    <body>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="w-full sm:max-w-md mt-2 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-2 ">

                    <x-application-logo  />


                    <!-- Session Status -->
                    <div class="mb-4 font-medium text-sm text-green-600">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>

                    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
                        {{ $slot }}
                    </div>
                </div>


            </div>

        </div>
    </body>
</html>
