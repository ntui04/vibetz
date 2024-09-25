<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                <textarea name="content" id="content" rows="6" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $post->content }}</textarea>
            </div>

            <!-- Media (Existing and Update) -->
            <div class="mb-4">
                <label for="media" class="block text-gray-700 font-bold mb-2">Current Media:</label>
                @if ($post->media)
                    @if (Str::endsWith($post->media, ['jpg', 'jpeg', 'png', 'gif']))
                        <img src="{{ asset('storage/' . $post->media) }}" alt="Current Media" class="w-32 h-32 object-cover rounded-md mb-4">
                    @elseif(Str::endsWith($post->media, ['mp4', 'mov', 'avi']))
                        <video width="150" height="150" controls class="rounded-md mb-4">
                            <source src="{{ asset('storage/' . $post->media) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                @else
                    <p class="text-gray-600">No media available.</p>
                @endif

                <label for="media" class="block text-gray-700 font-bold mb-2">Update Media (Optional):</label>
                <input type="file" name="media" id="media" class="block w-full text-gray-700 px-3 py-2 border rounded-md">
            </div>

            <!-- Save Button -->
            <div class="flex justify-between">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                    Update Post
                </button>
                <a href="{{ route('posts.index') }}"
                    class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>

</html>
