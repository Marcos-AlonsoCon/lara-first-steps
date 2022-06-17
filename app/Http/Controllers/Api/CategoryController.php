<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Category::paginate(10);
        // IN THIS API FILE WE ARE SENDING A RESPONSE, DIFFERENT FROM THE CategoryController WHERE A view IS RETURNED
        return response()->json(Category::paginate(10));
    }


    public function all(){
        return response()->json(Category::get());
    }


    public function slug($slug){
        $category = Category::where("slug", $slug)->firstOrFail();
        return response()->json($category);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("ok");
    }


    public function posts(Category $category)
    {
        // USING QUERY BUILDER
        // $posts = Post::join('categories',"categories.id","=","posts.category_id")
        // ->select("posts.*", "categories.title as category")
        // ->where("categories.id",$category->id)
        // ->get();

        // USING RELATIONSHIP STABLISHED ABOVE
        $posts = Post::with("category")
        ->where("category_id",$category->id)
        ->get();

        return response()->json($posts);
    }
}
