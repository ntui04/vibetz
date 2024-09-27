<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Music</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center text-center">
            <a href="/" class="text-white text-2xl font-bold">VibeTZ</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('music.index') }}" class="text-white hover:underline">Music</a></li>
                <li><a href="/music/create" class="text-white hover:underline">Add Music</a></li>
                <li><a href="#" class="text-white hover:underline">Contact</a></li>
                <li><a href="#" class="text-white hover:underline">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 text-center">
        {{-- <h1 class="text-3xl font-bold text-center mb-8">All Music</h1> --}}

        @if ($music->isEmpty())
            <p class="text-center text-gray-600">No music available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($music as $track)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $track->title }}</h2>
                        <p class="text-gray-700 mb-4">Artist: {{ $track->artist }}</p>
                        <p class="text-gray-700 mb-4">Album: {{ $track->album }}</p>
                        <p class="text-gray-700 mb-4">Genre: {{ $track->genre }}</p>

                        @if ($track->audio)
                            <div class="mb-4">
                                <audio controls class="w-full">
                                    <source src="{{ asset('storage/' . $track->audio) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @else
                            <p class="text-red-500">No audio file available for this track.</p>
                        @endif

                        <!-- View More or Download Button -->
                        <a href="{{ route('music.show', $track->id) }}"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                            View / Download
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>
