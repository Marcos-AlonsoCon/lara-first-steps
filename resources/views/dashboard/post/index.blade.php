{{-- THIS VIEW SHOWS ALL THE POSTS DATA --}}

@extends('dashboard.layout')

@section('content')

<a class="btn btn-success my-3" href="{{ route("post.create") }}">CREATE</a>

<table class="table mb-3">
    <thead>
        <tr>
            <th>
                Title
            </th>
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
                    {{-- CAN ACCESS TO THE POST CATEGORY BECAUSE OF THE RELATIONSHIP IN THE MODEL --}}
                    {{ $post->category->title }}
                </td>
                <td>
                    {{ $post->posted }}
                </td>
                <td>
                    {{-- SEND TO THE ROUTE WITH THE POST WE WANT TO UPDATE SOMEHOW OR SHOW--}}
                    <a class="btn btn-primary mt-2" href="{{ route("post.edit", $post) }}">Edit</a>
                    <a class="btn btn-primary mt-2" href="{{ route("post.show", $post) }}">Show</a>
                    
                    {{-- TO DELETE, A FORM MUST BE APPLIED --}}
                    {{-- WE ALSO NEED TO PROVIDE THE METHOD THAT IS BEING USED --}}
                    <form action="{{ route("post.destroy", $post) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class="btn btn-danger mt-2" type="submit">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    
</table>

{{-- SHOWS THE PAGINATION OF THE LISTED POSTS --}}
{{ $posts->links() }}

@endsection