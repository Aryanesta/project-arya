@extends('layout.app')

{{-- @dd($user->post) --}}

@section('container')
    <h1>{{ $user->name }} Post</h1>

    <form action="/blog"  class="input-group my-5 w-50">
        <input type="hidden" name="user" value="{{ $user->username }}">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    @foreach ($posts as $post)        
        <article class="my-4 text-dark border-bottom">
            <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <h5>Category: <a href="/single-category/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            {!! $post->excerpt !!}

            <a href="/blog/{{ $post->slug }}" class="d-block mb-2">Read more..</a>
        </article>
    @endforeach
@endsection