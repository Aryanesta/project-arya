<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blog', [
            'title' => 'Blog',
            'posts' => Post::latest()->get(),
        ]);
    }

    public function show(Post $post) {
        return view('single-post', [
            'title' => 'Blog',
            'posts' => $post->load('category', 'user'),
        ]);
    }
}
