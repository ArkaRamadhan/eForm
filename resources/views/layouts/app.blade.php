<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('dark_mode', 'light') }}">
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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <button onclick="toggleDarkMode()">Toggle Dark Mode</button>

        <script>
            // Script untuk toggle dark mode
            function toggleDarkMode() {
                let htmlClasses = document.querySelector('html').classList;
                if (htmlClasses.contains('dark')) {
                    htmlClasses.remove('dark');
                    // Simpan preferensi pengguna
                    fetch('/dark-mode', {
                        method: 'POST',
                        body: JSON.stringify({ mode: 'light' }),
                        headers: { 'Content-Type': 'application/json' }
                    });
                } else {
                    htmlClasses.add('dark');
                    // Simpan preferensi pengguna
                    fetch('/dark-mode', {
                        method: 'POST',
                        body: JSON.stringify({ mode: 'dark' }),
                        headers: { 'Content-Type': 'application/json' }
                    });
                }
            }
        </script>
    </body>
</html>
