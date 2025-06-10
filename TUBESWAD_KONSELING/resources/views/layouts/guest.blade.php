<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('laravel.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900 overflow-hidden">

    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow h-16 flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Selamat Datang di Website Konseling
            </h2>
        </div>
    </header>

    <!-- Main Content -->
    <div class="min-h-[calc(100vh-4rem)] flex flex-col justify-center items-center overflow-hidden"> 
        <!-- Logo -->
        <div class="mt-6">
            <img src="{{ asset('konseling.jpg') }}" alt="Logo" class="w-full max-w-xs h-auto">
        </div>

        <!-- Login Box -->
        <div class="w-full sm:max-w-md mt-6 mb-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
