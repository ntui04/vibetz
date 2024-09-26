<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music List</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold text-center mb-8">Music List</h1>

    <div class="max-w-8xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-500">
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Artist</th>
                    <th class="px-4 py-2 border">Album</th>
                    <th class="px-4 py-2 border">Genre</th>
                    <th class="px-4 py-2 border">Audio</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($music as $track)
                    <tr>
                        <td class="border px-4 py-2">{{ $track->title }}</td>
                        <td class="border px-4 py-2">{{ $track->artist }}</td>
                        <td class="border px-4 py-2">{{ $track->album }}</td>
                        <td class="border px-4 py-2">{{ $track->genre }}</td>
                        <td class="border px-4 py-2">
                            @if ($track->audio)
                                <audio controls class="w-full">
                                    <source src="{{ asset('storage/' . $track->audio) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @else
                                <span class="text-red-500">No audio file uploaded</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('music.edit', $track->id) }}" class="bg-blue-500 text-white mt-5 px-4 py-2 rounded-md hover:bg-blue-600">Edit</a>
                            <form action="{{ route('music.destroy', $track->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-5 rounded-md hover:bg-red-600"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
