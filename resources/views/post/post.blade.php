<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-12 gap-4">
            <!-- Left Sidebar -->
            <div class="hidden lg:block lg:col-span-3 bg-gray-200 p-4 rounded-lg">
                <!-- Add any content you want here for the left side -->
                <h2 class="text-xl font-bold mb-4">Left Sidebar</h2>
                <p class="text-gray-600">You can place ads, navigation, or related links here.</p>
            </div>

            <!-- Main Content -->
            <div class="col-span-12 lg:col-span-6 bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-700 text-lg mb-6">{{ $post->content }}</p>

                @if ($post->media)
                    <div class="mb-6">
                        @if (Str::endsWith($post->media, ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ asset('storage/' . $post->media) }}" alt="Post Media"
                                class="w-full h-auto rounded-md">
                        @elseif(Str::endsWith($post->media, ['mp4', 'mov', 'avi']))
                            <video width="100%" height="480" controls class="rounded-md">
                                <source src="{{ asset('storage/' . $post->media) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                @endif

                <a href="{{ route('posts.index') }}"
                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                    Back to All Posts
                </a>
            </div>

            <!-- Right Sidebar -->
            <div class="hidden lg:block lg:col-span-3 bg-gray-200 p-4 rounded-lg">
                <!-- Add any content you want here for the right side -->
                <h2 class="text-xl font-bold mb-4">Right Sidebar</h2>
                <p class="text-gray-600">You can place additional links or widgets here.</p>
            </div>
        </div>
    </div>

</body>

</html>
