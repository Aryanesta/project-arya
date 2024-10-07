@extends('layout.main')

{{-- @dd($category->post) --}}

@section('container')
    <h1>Category : {{ $category->name }}</h1>
        @foreach ($posts as $post)
            <article class="my-4 text-dark border-bottom">
                <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <h5>By: <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a></h5>
                {{ $post->excerpt }}

                <a href="/blog/{{ $post->slug }}" class="d-block mb-2">Read more..</a>
            </article>
        @endforeach
@endsection