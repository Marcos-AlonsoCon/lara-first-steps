@extends('web.layout')

@section('content')
    {{-- PASSING THE POST TO THE show COMPONENT --}}

    <x-web.blog.post.show :post="$post" />


@endsection