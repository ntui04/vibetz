<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Search Results</title>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Search Results</h1>
    
        <!-- Check if both music and postResults are empty -->
        @if ($music->isEmpty() && $postResults->isEmpty())
            <p class="text-lg text-center text-red-500">No results found for "{{ request('query') }}".</p>
        @endif
    
        <!-- Search Results for Music -->
        @if (!$music->isEmpty())
            <h2 class="text-2xl font-semibold mb-4 text-gray-700 text-center">Music Results</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
                @foreach ($music as $track)
                    <div class="bg-white shadow-lg text-center rounded-lg overflow-hidden hover:shadow-2xl transition duration-300 ease-in-out">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $track->title }}</h3>
                            <p class="text-gray-600">Artist: {{ $track->artist }}</p>
                            <p class="text-gray-600">Album: {{ $track->album }}</p>
                            <p class="text-gray-600">Genre: {{ $track->genre }}</p>
                        </div>
                        @if ($track->audio)
                            <div class="bg-gray-100 p-4">
                                <audio controls class="w-full">
                                    <source src="{{ asset('storage/' . $track->audio) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @else
                            <p class="text-red-500 p-4 text-center">No audio file available.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    
        <!-- Search Results for Posts -->
        @if (!$postResults->isEmpty())
            <h2 class="text-2xl font-semibold mb-4 mt-10 text-gray-700 text-center">Post Results</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 text-center lg:grid-cols-3 gap-6 justify-center">
                @foreach ($postResults as $post)
                    <div class="bg-white shadow-lg text-center rounded-lg overflow-hidden hover:shadow-2xl transition duration-300 ease-in-out">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">
                                Read more
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
