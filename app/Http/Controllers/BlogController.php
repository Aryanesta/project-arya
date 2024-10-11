<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $postTitle = '';
        if (request('category')){
            $postTitle = 'Category : ' . Category::where('slug', request('category'))->get()[0]->name;
            // dd(Category::where('slug', request('category'))->get());
        } else if (request('user')) {
            $postTitle = 'Author : ' . User::where('username', request('user'))->get()[0]->name;
        }
        return view('blog', [
            'title' => 'Blog',
            'posts' => Post::with(['category', 'user'])->latest()->filters(request(['search', 'category', 'user']))->paginate(7)->withQueryString(),
            'postTitle' => $postTitle,
        ]);
    }

    public function show(Post $post) {
        return view('single-post', [
            'title' => 'Blog',
            'posts' => $post->load('category', 'user'),
        ]);
    }
}
