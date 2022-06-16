{{-- THIS VIEW SHOWS ALL THE POSTS DATA --}}

@extends('dashboard.layout')

@section('content')

<a href="{{ route("category.create") }}">CREATE</a>

<table>
    <thead>
        <tr>
            <th>
                Title
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->title }}
                </td>
                <td>
                    {{-- SEND TO THE ROUTE WITH THE POST WE WANT TO UPDATE SOMEHOW OR SHOW--}}
                    <a href="{{ route("category.edit", $category) }}">Edit</a>
                    <a href="{{ route("category.show", $category) }}">Show</a>
                    
                    {{-- TO DELETE, A FORM MUST BE APPLIED --}}
                    {{-- WE ALSO NEED TO PROVIDE THE METHOD THAT IS BEING USED --}}
                    <form action="{{ route("category.destroy", $category) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
</table>

{{-- SHOWS THE PAGINATION OF THE LISTED POSTS --}}
{{ $categories->links() }}

@endsection