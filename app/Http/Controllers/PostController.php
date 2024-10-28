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

    public function manage()
    {
        $posts = Post::paginate(6);
        return view('post.manage', compact('posts'));
    }

    public function edit($id){

        $post  = Post::findOrFail($id);
        return view('post.edit', compact('post'));
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

        return redirect('/admin')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);
    
        // Update the title and content
        $post->title = $request->title;
        $post->content = $request->content;
    
        // Check if a new media file is uploaded
        if ($request->hasFile('media')) {
            // Store the new media file and update the media path
            $path = $request->file('media')->store('media', 'public');
            $post->media = $path;
        } else {
            // Retain the existing media if no new file is uploaded
            $post->media = $post->media; // This ensures the old media is retained
        }
    
        // Save the updated post
        $post->save();
    
        // Redirect with a success message
        return redirect('manage/post')->with('success', 'Post updated successfully.');
    }
    


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('manage/post');
    }
}
