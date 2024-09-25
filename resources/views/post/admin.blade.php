<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">All Posts</h1>

        @if ($posts->isEmpty())
            <p class="text-center text-gray-600">No posts available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>

                        @if ($post->media)
                            <div class="mb-4">
                                @if (Str::endsWith($post->media, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $post->media) }}" alt="Post Media"
                                        class="w-full h-32 object-cover rounded-md">
                                @elseif(Str::endsWith($post->media, ['mp4', 'mov', 'avi']))
                                    <video controls class="w-full h-32 rounded-md">
                                        <source src="{{ asset('storage/' . $post->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        @endif

                        <div class="flex justify-between mt-4">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>
