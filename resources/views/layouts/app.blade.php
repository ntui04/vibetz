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
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <ul class="flex space-x-4">
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li>
                                <h1 class="text-lg font-semibold">
                                    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Admin Dashboard</a>
                                </h1>
                            </li>
                        @else
                            <li><a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">User Dashboard</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('login') }}" class="text-gray-600 hover:underline">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-600 hover:underline">Register</a></li>
                    @endauth
                </ul>
            </div>
        </nav>

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
            @yield('content')
        </main>
    </div>
</body>
</html>
