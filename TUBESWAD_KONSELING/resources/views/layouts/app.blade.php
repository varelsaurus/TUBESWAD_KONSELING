<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div>
                <!-- Add navigation links here -->
                <a href="#" class="text-gray-600 hover:text-blue-500 px-3">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-500 px-3">About</a>
                <a href="#" class="text-gray-600 hover:text-blue-500 px-3">Contact</a>
            </div>
        </div>
    </nav>
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
