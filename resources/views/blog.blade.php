@extends('layout.main')

@section('container')
 
    <div class="card mb-3">
        <img src="https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="height: 400px">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>

    <h1>Blog Post</h1>
    @foreach ($posts as $post)
        <article class="my-4 text-dark border-bottom">
            <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <h5>By: 
                <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> 
                in <a href="/single-category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </h5>
            {{ $post->excerpt }}
            <a href="/blog/{{ $post->slug }}" class="d-block mb-2">Read more..</a>
        </article>
    @endforeach
@endsection