<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
// IMPORTING THE REQUEST FOR POSTS
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // paginate RETRIEVES THE NUMBER OF ELEMENTS WE WANT TO SHOW AND THEN USE PAGINATION IN index VIEW
        $posts = Post::paginate(2);
        return view('dashboard.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // SHOWS THE FORM TO CREATE A POST
    public function create()
    {
        // GETTING CATEGORIES USING THE Category MODEL
        // Category::get() IS LIKE select * from categories
        // $categories = Category::get();

        // PLUCK RETURNS ONLY THE DATA WE WANT FROM Category REGISTERS
        $categories = Category::pluck('id', 'title');

        $post = new Post();
        // dd($categories);
        // SENDING THE CATEGORIES TO THE create FORM IN ORDER TO SHOW THEM AS OPTION CATEGORIES
        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // STORES THE NEW POST FROM THE create METHOD FORM
    // StoreRequest ALLOWS USING THE StoreRequest OF THE POSTS
    // IF THE VALIDATION FAILS, IT WILL SEND YPU BACK TO THE LAST VIEW (create's FORM)
    public function store(StoreRequest $request)
    {
        // echo request("title");
        // RETRIEVING DATA FROM THE create METHOD FORM 
            // echo $request->input('slug');
        // dd FORMATS THE ARRAY WITH ALL THE $request ELEMENTS
            // dd($request->all());

        // ANOTHER WAY TO VALIDATE BUT LOCALLY
            // $validated = $request->validate([
            //     "title" => "required|min:5|max:500",
            //     "slug" => "required|min:5|max:500",
            //     "content" => "required|min:5|max:500",
            //     "category_id" => "required|integer",
            //     "description" => "required|min:7",
            //     "posted" => "required"
            // ]);

            // dd($validated);
        
        // $data = array_merge($request->all(),['image' => '']);
        
        // EXECUTES THE CREATE REQUEST WITH VALIDATIONS
        Post::create($request->validated());
        // dd($request->validated());

        return to_route("post.index")->with('status',"Post created!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        echo view('dashboard.post.edit', compact('categories','post'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  USING PutRequest TO EXECUTE VALIDATIONS FOR THE UPDATE METHOD
    public function update(PutRequest $request, Post $post)
    {
        // SAVING IMAGE
        $data = $request->validated();
        if (isset($data["image"])) {
            // GIVING IMAGE A NAME
            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }

        // dd($request->validated());
        $post->update($data);

        

        // SENDS CONFIRMATION MESSAGE WHEN A POST IS UPDATED
        // $request->session()->flash('status',"Post updated!");
        // with ALLOWS TO ALSO SEND A MESSAGE WHEN A POST US UPDATED
        return to_route("post.index")->with('status',"Post updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status',"Post deleted!");
    }
}
