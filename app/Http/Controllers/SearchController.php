<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Query the database to search for tracks that match the query
        $music = Music::where('title', 'LIKE', "%$query%")
            ->orWhere('artist', 'LIKE', "%$query%")
            ->orWhere('album', 'LIKE', "%$query%")
            ->orWhere('genre', 'LIKE', "%$query%")
            ->get();

            $postResults = Post::where('title', 'LIKE', "%$query%")
            ->orWhere('content', 'LIKE', "%$query%")
            ->get();

        // Return the results to the view
        return view('landingpage.search-result', compact('music', 'postResults'));
    }
}
