<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::all();
        return view('music.index', compact('music'));
    }

    public function index2()
    {

        $music = Music::all();
        return view('music.show', compact('music'));
    }

    public function search(Request $request)
    {
        // dd($request);
        $query = $request->input('query');

        // Query the database to search for tracks that match the query
        $music = Music::where('title', 'LIKE', "%$query%")
            ->orWhere('artist', 'LIKE', "%$query%")
            ->orWhere('album', 'LIKE', "%$query%")
            ->orWhere('genre', 'LIKE', "%$query%")
            ->get();

        // Return the results to the view
        return view('music.search', compact('music'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        // Manual validation logic
        // dd($request);
        $music = new Music();
        $music->title = $request->title;
        $music->artist = $request->artist;
        $music->album = $request->album;
        $music->genre = $request->genre;


        if ($request->hasFile('audio')) {
            $path = $request->file('audio')->store('audio', 'public');
            // dd($request->file('audio'));
            $music->audio = $path;
        }

        $music->save();

        return redirect('/posts')->with('success', 'Music added successfully!');
    }

    public function show($id)
    {
        $music = Music::findOrFail($id);

        return view('music.show', compact('music'));
    }

    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
    }

    public function update(Request $request, $id)
    {
        // Find the music record
        $music = Music::findOrFail($id);

        // Manual validation logic
        if (!$request->filled('title') || !$request->filled('artist')) {
            return redirect()->back()->withErrors(['Title and Artist are required.']);
        }

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            if (!in_array($file->getClientOriginalExtension(), ['mp3', 'wav'])) {
                return redirect()->back()->withErrors(['Invalid media type. Only MP3 and WAV are allowed.']);
            }

            $mediaPath = $file->store('music', 'public');
        }

        // Update the music data
        $music->update([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'album' => $request->input('album'),
            'genre' => $request->input('genre'),
            'media' => $mediaPath ?? $music->media,  // Keep existing media if not updated
        ]);

        return redirect()->route('music.index')->with('success', 'Music updated successfully!');
    }

    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('music.index')->with('success', 'Music deleted successfully!');
    }
}
