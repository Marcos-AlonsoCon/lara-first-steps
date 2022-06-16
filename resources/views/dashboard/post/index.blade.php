{{-- THIS VIEW SHOWS ALL THE POSTS DATA --}}

@extends('dashboard.layout')

@section('content')

<a href="{{ route("post.create") }}">CREATE</a>

<table>
    <thead>
        <tr>
            <th>
                Title
            </td>
            <th>
                Category
            </th>
            <th>
                Posted
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{-- CAN ACCESS TO THE POST CATEGORY BECAUSE FOF THE RELATIONSHIP IN THE MODEL --}}
                    {{ $post->category->title }}
                </td>
                <td>
                    {{ $post->posted }}
                </td>
                <td>
                    {{-- SEND TO THE ROUTE WITH THE POST WE WANT TO UPDATE SOMEHOW OR SHOW--}}
                    <a href="{{ route("post.edit", $post) }}">Edit</a>
                    <a href="{{ route("post.show", $post) }}">Show</a>
                    
                    {{-- TO DELETE, A FORM MUST BE APPLIED --}}
                    {{-- WE ALSO NEED TO PROVIDE THE METHOD THAT IS BEING USED --}}
                    <form action="{{ route("post.destroy", $post) }}" method="post">
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
{{ $posts->links() }}

@endsection