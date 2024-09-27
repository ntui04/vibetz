<!-- resources/views/search-results.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">

    <!-- Navigation Bar (reuse the navbar from landing page) -->
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

    <!-- Search Results -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-6">Search Results</h1>

        @if($music->isEmpty())
            <p class="text-center text-gray-600">No results found for your query.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($music as $track)
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold mb-2">{{ $track->title }}</h2>
                        <p class="text-gray-600 mb-4">Artist: {{ $track->artist }}</p>
                        <p class="text-gray-600 mb-4">Genre: {{ $track->genre }}</p>
                        @if ($track->audio)
                            <audio controls class="w-full">
                                <source src="{{ asset('storage/' . $track->audio) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        @else
                            <p class="text-red-500">No audio file available for this track.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer (reuse the footer from landing page) -->
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
