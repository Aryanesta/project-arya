@extends('layout.app')

@section('container')
        <article class="my-4 text-dark">
            <h2>{{ $posts->title }}</h2>
            <h5>By: <a href="/author/{{ $posts->user->username }}">{{ $posts->user->name }}</a> in 
                <a href="/single-category/{{ $posts->category->slug }}">{{ $posts->category->name }}</a>
            </h5>
            {{-- <h6>Category: {{ $posts->category }}</h6> --}}
            {!! $posts->body !!}
        </article>

        <a href="/blog">Back to blog</a>
@endsection