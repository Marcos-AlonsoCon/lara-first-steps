
@extends('dashboard.layout')


@section('content')
<h1>UPDATE CATEGORY: {{ $category->title }}</h1>

@include('dashboard.fragment._errors-form')

{{-- NEED TO PASS THE id TO THE UPDATE METHOD TO SHOW A SPECIFIC REGISTER --}}
{{-- enctype NEEDES TO SUBMIT MEDIA FILES --}}
<form action="{{ route('category.update',$category->id) }}" method="post">
    @method("PATCH")

    @include('dashboard.category._form')

</form>
@endsection
