<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create post</title>
</head>
<body>
    <h1>CREATE POST</h1>

    {{-- action USES THE STORE ROUTE OF PostController --}}
    <form action="{{ route('post.store') }}" method="post">
        {{-- csrf VALIDATES A TOKEN TO VERIFY THE DATA IS BEING SENT FROM THIS FORM 
             THIS AVOIDS PETITION ATTACKS --}}
        @csrf

        {{-- FORM TO CREATE POST --}}
        {{-- NAME IS REQUIRED TO IDENTIFY THE DATA IN THE $request PARAM IN post.store METHOD --}}
        <label for="">Title</label>
        <input type="text" name="title">

        <label for="">Slug</label>
        <input type="text" name="slug">

        <label for="">Content</label>
        <textarea name="content"></textarea>

        <label for="">Description</label>
        <textarea name="description"></textarea>

        <button type="submit">Send</button>

    </form>

</body>
</html>