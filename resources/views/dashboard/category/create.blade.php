{{-- EXTENDING LAYOUT FOR DASHBOARD --}}

@extends('dashboard.layout')

{{-- DECLARING THE CONTENT FOR THIS SPECIFIC VIEW --}}

@section('content')
<h1>CREATE CATEGORY</h1>

{{-- IF THERE ARE ANY ERRORS, THEY WILL BE SHOWN HERE --}}
{{-- USE include TO IMPORT AND USE THE FRAGMENT THAT WILL SHOW THE ERRORS IN VALIDATION --}}
@include('dashboard.fragment._errors-form')

{{-- action USES THE STORE ROUTE OF categoryController --}}
<form action="{{ route('category.store') }}" method="post">
    
    @include('dashboard.category._form')

</form>
@endsection