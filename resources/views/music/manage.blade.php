<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - {{ config('app.name') }}</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Sidebar -->
        <div class="flex flex-row">
            <aside class="w-64 bg-gray-800 h-screen flex flex-col">
                <div class="text-white text-2xl font-semibold p-6">Admin Panel</div>
                <nav class="mt-10">
                    <ul>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/admin" class="block">Dashboard</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="#" class="block">Manage Users</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/manage/post" class="block">Manage Posts</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <a href="/manage/music" class="block">Manage Music</a>
                        </li>
                        <li class="py-2 px-6 text-white hover:bg-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 bg-white p-6">
                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Manage Music</h2>
                    <a class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300" href="/music/create">Add Music</a>
                    
                    <div class="overflow-x-auto mt-5">
                        <table class="table-auto w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Artist</th>
                                    <th class="px-4 py-2">Audio</th> <!-- New audio column -->
                                    <th class="px-4 py-2">Created At</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($music as $track)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $track->id }}</td>
                                        <td class="border px-4 py-2">{{ $track->title }}</td>
                                        <td class="border px-4 py-2">{{ $track->artist }}</td>
                                        <td class="border px-4 py-2">
                                            @if($track->audio)
                                                <audio controls class="w-full">
                                                    <source src="{{ asset('storage/' . $track->audio) }}" type="audio/mpeg">
                                                    Your browser does not support the audio tag.
                                                </audio>
                                            @else
                                                <span>No audio file</span>
                                            @endif
                                        </td> <!-- Display audio player if available -->
                                        <td class="border px-4 py-2">{{ $track->created_at }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="#" class="text-blue-600">Edit</a>
                                            <form action="#" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $music->links() }} <!-- Tailwind CSS styled pagination links -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
