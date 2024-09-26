<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Audio Track</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Audio Track</h1>

        <form action="{{ route('music.update', $music->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Song Title / Name:</label>
                <input type="text" name="title" id="title" value="{{ $music->title }}" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="artist" class="block text-gray-700 font-medium mb-2">Artist Name:</label>
                <input type="text" name="artist" id="artist" value="{{ $music->artist }}" required
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="album" class="block text-gray-700 font-medium mb-2">Album:</label>
                <input type="text" name="album" id="album" value="{{ $music->album }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 font-medium mb-2">Genre:</label>
                <input type="text" name="genre" id="genre" value="{{ $music->genre }}"
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label for="audio" class="block text-gray-700 font-medium mb-2">Upload New Audio (Optional):</label>
                <input type="file" name="audio" id="audio"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- If there's already an audio file, show it -->
            @if ($music->audio)
                <div class="mb-6">
                    <p class="text-gray-700">Current Audio File:</p>
                    <audio controls>
                        <source src="{{ asset('storage/' . $music->audio) }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            @endif

            <button type="submit"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Update Audio Track
            </button>
        </form>

        <div class="mt-10 text-center">
            <a href="{{ route('music.index') }}"
                class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                Back to Audio List
            </a>
        </div>
    </div>

</body>

</html>
