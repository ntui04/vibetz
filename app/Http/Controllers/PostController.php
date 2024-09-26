<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('post.show', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Find the post by its ID, or return a 404 if not found

        return view('post.post', compact('post')); // Return a view and pass the post data
    }


    public function createPost()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        // Handle media file upload
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('media', 'public');
            $post->media = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;

        // Handle media file upload
        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('media', 'public');
            $post->media_url = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
