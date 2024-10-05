<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - {{ config('app.name') }}</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Sidebar -->
        <div class="flex flex-row">
            <aside class="w-64 bg-gray-800 h-screen flex flex-col">
                <div class="text-white text-2xl font-semibold p-6">Admin Panel</div>
                <nav class="mt-10">
                    <ul>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/admin" class="block">Dashboard</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="#" class="block">Manage Users</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/manage/post" class="block">Manage Posts</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/manage/music" class="block">Manage Music</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 bg-white p-6">
                <div>
                    <h1>
                        vibetz
                    </h1>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
