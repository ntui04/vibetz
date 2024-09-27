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
     <!-- Navigation Bar -->
     <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold">VibeTZ</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('posts.index') }}" class="text-white hover:underline">Posts</a></li>
                <li><a href="/post/create" class="text-white hover:underline">Add post</a></li>
                <li><a href="#" class="text-white hover:underline">Contact</a></li>
                <li><a href="#" class="text-white hover:underline">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        {{-- <h1 class="text-3xl font-bold text-center mb-8">All Posts</h1> --}}
       

        @if ($posts->isEmpty())
            <p class="text-center text-gray-600">No posts available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 150) }}</p>

                        @if ($post->media)
                            <div class="mb-4">
                                @if (Str::endsWith($post->media, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset('storage/' . $post->media) }}" alt="Post Media"
                                        class="w-full h-48 object-cover rounded-md">
                                @elseif(Str::endsWith($post->media, ['mp4', 'mov', 'avi']))
                                    <video width="100%" height="240" controls class="rounded-md">
                                        <source src="{{ asset('storage/' . $post->media) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        @endif

                        <!-- Read More Button -->
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                            Read More
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>
