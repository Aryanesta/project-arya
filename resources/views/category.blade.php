@extends('layout.main')

@section('container')
    <h1>Blog Categories</h1>
    @foreach ($categories as $category)
        <article class="my-4 text-dark">
            <h3><a href="/single-category/{{ $category->slug }}">{{ $category->name }}</a></h3>
        </article>
    @endforeach
@endsection