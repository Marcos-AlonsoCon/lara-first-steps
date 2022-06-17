{{-- COMPONENT THAT SHOW BLOGS POSTS --}}
<div>
    {{-- slot IS AN ELEMENT FROM THE VIEW (index) THAT CAN BE DISPLAYED HERE ANYWHERE --}}
    {{ $slot }}

    @foreach ($posts as $post)
    <div class="card card-white mb-2">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->description }}</p>
        <a href="{{ route("web.blog.show",$post) }}">Read</a>
    </div>

    @endforeach

    {{-- NAVIGATION FOR THE SHOWN POSTS --}}
    {{ $posts->links() }}
    
</div>