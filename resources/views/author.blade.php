@extends('layout.main')

{{-- @dd($user->post) --}}

@section('container')
    <h1>{{ $user }} Post</h1>
    @foreach ($posts as $post)        
        <article class="my-4 text-dark border-bottom">
            <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <h5>Category: <a href="/single-category/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            {!! $post->excerpt !!}

            <a href="/blog/{{ $post->slug }}" class="d-block mb-2">Read more..</a>
        </article>
    @endforeach
@endsection