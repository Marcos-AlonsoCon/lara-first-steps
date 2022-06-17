@extends('web.layout')

@section('content')
    {{-- PASSING THE POSTS TO THE index COMPONENT OF THE web.blog.post DIRECTORY --}}
    {{-- <x-web.blog.post.index :posts="$posts"/> --}}

    <x-web.blog.post.index :posts="$posts">
        <h1>All posts</h1>
    </x-web.blog.post.index>


@endsection