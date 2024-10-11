@extends('layout.app')

@section('container')
    @if ($posts->count() > 0)
    <h1 class="d-flex justify-content-center">{{ $postTitle }}</h1>

    <form action="/blog"  class="input-group my-4 w-50" style="margin: auto">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <div class="card mb-3">
        <span style="position: absolute; padding: 5px;" class="bg-white rounded text-dark m-3">
            {{ $posts[0]->category->name }}
        </span>

        <a href="/blog/{{ $posts[0]->slug }}">
            <img src="upload/banner.png" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="height: 400px">
        </a>

        <div class="card-body">
            <h2 class="card-title">
                <a href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
            </h2>
            
            <h6><small>By: 
                <a href="/author/{{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> 
                in <a href="/single-category/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a></small>
            </h6>
            
            <p class="card-text text-dark">{{ $posts[0]->excerpt }}</p>
            <p class="card-text">
                <small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small>
            </p>
            <button type="button" class="btn btn-primary">
                <a href="/blog/{{ $posts[0]->slug }}" class="d-block text-decoration-none text-white">Read more</a>
            </button>
        </div>
    </div>

    <!-- Two columns: 50% width on all screens, except for extra small (100% width) -->
    <div class="row justify-content-center">
        @foreach ($posts->skip(1) as $post)
        <div class="card col-xl-4 col-lg-6 col-sm-6 border-0 mb-3" style="width: 18rem;">
            <span style="position: absolute; padding: 5px;" class="bg-white rounded text-dark m-3">
                {{ $post->category->name }}
            </span>
            <img src="upload/product-{{ mt_rand(1, 12) }}.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h5>
                <h6><small>By: 
                    <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a> 
                    in <a href="/single-category/{{ $post->category->slug }}">{{ $post->category->name }}</a></small>
                </h6>
                <p class="card-text">{{ $post->excerpt }}</p>
                <p class="card-text">
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                </p>
                <button type="button" class="btn btn-primary">
                    <a href="/blog/{{ $post->slug }}" class="d-block text-decoration-none text-white">Read more</a>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
        
    @else
        <h2 class="d-flex justify-content-center">Posts not found!</h2>
    @endif


@endsection