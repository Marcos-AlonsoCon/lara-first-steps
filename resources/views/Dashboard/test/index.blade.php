@extends('layout.master')

<!-- USE section() TO ESTABLISH THE content OF THE PAGE -->
@section('content')

 <!-- USE include WHEN IMPORTING A FRAGMENT -->
    @include("fragment.subview")

    @forelse ($posts as $a)
        <div class="box item">
            <p>- {{$a}}</p>
        </div>     
    
    @empty
            NO DATA
    @endforelse


@endsection