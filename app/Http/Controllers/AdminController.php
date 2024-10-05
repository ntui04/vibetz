<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $users = User::all();
        $posts = Post::all();
        $music = Music::all();
        return view('admin.dashboard', compact('users', 'posts', 'music'));
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    public function managePosts()
    {
        $posts = Post::all();
        return view('admin.manage-posts', compact('posts'));
    }

    public function manageMusic()
    {
        $music = Music::all();
        return view('admin.manage-music', compact('music'));
    }
}
