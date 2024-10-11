@extends('layout.app')

{{-- @dd($category->post) --}}

@section('container')
    <h1>Category : {{ $category->name }}</h1>

    <form action="/blog"  class="input-group my-5 w-50">
        <input type="hidden" name="category" value="{{ $category->slug }}">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <article class="my-4 text-dark border-bottom">
                <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <h5>By: <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a></h5>
                {{ $post->excerpt }}

                <a href="/blog/{{ $post->slug }}" class="d-block mb-2">Read more..</a>
            </article>
        @endforeach
    @else
        <h2 class="d-flex justify-content-center">Posts not found!</h2>
    @endif


@endsection