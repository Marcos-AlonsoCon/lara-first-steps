{{-- csrf VALIDATES A TOKEN TO VERIFY THE DATA IS BEING SENT FROM THIS FORM 
         THIS AVOIDS PETITION ATTACKS --}}
         @csrf

         {{-- FORM TO CREATE POST --}}
         {{-- NAME IS REQUIRED TO IDENTIFY THE DATA IN THE $request PARAM IN post.store METHOD --}}
         {{-- name HELPS TO IDENTIFY THE FIELD THAT IS BEING FILLED --}}
     
         <label for="">Title</label>
         {{-- old PLACES THE VALUES THAT WERE TYPED BEFORE AN ERROR OR VALIDATION OCCURS --}}
         {{-- old RECEIVES THE name OF THE HTML COMPONENT --}}
         <input type="text" class="form-control" name="title" value="{{ old("title",$post->title) }}">
     
         <label for="">Slug</label>
         <input type="text" class="form-control" name="slug" value="{{ old("slug",$post->slug) }}">
     
         <label for="">Select category</label>
         <select class="form-control" name="category_id">
             <option value=""></option>
             {{-- FOREACH USING Category::get() IN create PostController METHOD --}}
             {{-- @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->title }}</option>
             @endforeach --}}
     
             {{-- FOREACH USING Category::pluck() IN create PostController METHOD --}}
             {{-- as $title => $id IS A key => value STATEMENT --}}
             @foreach ($categories as $title => $id)
                 {{-- LEAVES THE old OPTION SELECTED --}}
                 <option  {{ old("category_id",$post->category_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $title }}</option>
             @endforeach
         </select>
     
         <label for="">Posted</label>
         <select class="form-control" name="posted">
             <option {{ old("posted",$post->posted) == "not" ? "selected" : "" }} value="not">No</option>
             <option {{ old("posted",$post->posted) == "yes" ? "selected" : "" }} value="yes">Yes</option>            
         </select>
     
         <label for="">Content</label>
         <textarea class="form-control" name="content">{{ old("content",$post->content) }}</textarea>
     
         <label for="">Description</label>
         <textarea class="form-control" name="description">{{ old("description",$post->description) }}</textarea>
         
         @if (isset($task) && $task == "edit")
             <label for="">Image</label>
             <input type="file" name="image">
         @endif
     
         <button type="submit" class="btn btn-success mt-2">Send</button>