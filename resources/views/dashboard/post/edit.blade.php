
@extends('dashboard.layout')


@section('content')
<h1>UPDATE POST: {{ $post->title }}</h1>

@include('dashboard.fragment._errors-form')

{{-- NEED TO PASS THE id TO THE UPDATE METHOD TO SHOW A SPECIFIC REGISTER --}}
{{-- enctype NEEDES TO SUBMIT MEDIA FILES --}}
<form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
    @method("PATCH")

    @include('dashboard.post._form',["task" => "edit"])

</form>
@endsection
