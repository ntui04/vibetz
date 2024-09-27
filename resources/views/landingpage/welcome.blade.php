<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">

    <!-- Navigation Bar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold">VibeTZ</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('posts.index') }}" class="text-white hover:underline">Posts</a></li>
                <li><a href="#" class="text-white hover:underline">About</a></li>
                <li><a href="#" class="text-white hover:underline">Contact</a></li>
                <li><a href="#" class="text-white hover:underline">Login</a></li>
            </ul>
        </div>
    </nav>
    <!-- Search Bar Below Navigation -->
    <!-- Hero Section with Search Bar -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-6">Welcome to VibeTZ</h1>
        <p class="text-lg text-gray-700 text-center mb-8">
            Your ultimate source for the latest in Tanzanian entertainment, including music, movies, and celebrity news.
        </p>

        <!-- Search Bar in Hero Section -->
        <form action="{{ route('music.search') }}" method="GET" class="text-center">
            <input type="text" name="query" placeholder="Search music, posts, or videos..."
                class="w-full sm:w-1/2 p-3 border rounded-md">
            <button type="submit"
                class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                Search
            </button>
        </form>
    </div>



    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-6">Welcome to VibeTZ</h1>
        <p class="text-lg text-gray-700 text-center mb-8">
            Your ultimate source for the latest in Tanzanian entertainment, including music, movies, and celebrity news.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Example Posts -->
            <a href="/posts">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-2">Latest Post Title</h2>
                    <p class="text-gray-600 mb-4">A brief description or excerpt from the post.</p>

                </div>
            </a>

            <a href="musics">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-2">Latest Music</h2>
                    <p class="text-gray-600 mb-4">A brief description or excerpt from the post.</p>

                </div>
            </a>

            <a href="#">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-2">Latest Post Videos</h2>
                    <p class="text-gray-600 mb-4">A brief description or excerpt from the post.</p>

                </div>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-200 p-4">
        <div class="container mx-auto text-center">
            <p class="text-gray-600">&copy; 2024 VibeTZ. All rights reserved.</p>
            <ul class="flex justify-center space-x-4 mt-2">
                <li><a href="#" class="text-gray-600 hover:underline">Privacy Policy</a></li>
                <li><a href="#" class="text-gray-600 hover:underline">Terms of Service</a></li>
            </ul>
        </div>
    </footer>

</body>

</html>
