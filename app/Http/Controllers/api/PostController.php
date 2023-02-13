<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->errorResponse('it has error',404);
        // return $this->successResponse('it was successful', PostResource::collection(Post::all()) ,200);
        return PostResource::collection(Post::paginate(2));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'user_id' => 'required',
            'thumbnail' => 'required|image',
            'post_category_id' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->messages(),422);
        }
        $imageName= Carbon::now()->microsecond .$request->thumbnail->getClientOriginalName();
        $request->thumbnail->storeAs('images/posts', $imageName , 'public');

        $new_post = Post::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'thumbnail' => $imageName,
            'post_category_id' => $request->post_category_id,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);
        return $this->successResponse('it was successful', $new_post,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post->category->name);
        // return $this->successResponse('successful', new PostResource($post) , 200);
        return (new PostResource($post->load('category')))->additional(['sts'=> 'x']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'thumbnail' => 'image',
            'slug' => 'required|string|unique:posts,slug,'.$post->id,
            'excerpt' => 'required|string',
            'body' => 'required|string'
        ]);

        if($validator->fails()){
            return $this->errorResponse($validator->messages(),422);
        }
        if($request->has('thumbnail')){
            $imageName= Carbon::now()->microsecond .$request->thumbnail->getClientOriginalName();
            $request->thumbnail->storeAs('images/posts', $imageName , 'public');
        }

        $post->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'thumbnail' => $request->has('thumbnail') ? $imageName : $post->thumbnail ,
            'post_category_id' => $request->post_category_id,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);
        return $this->successResponse('it was successful', $post,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return $this->successResponse('post is deleted successfully', $post,200);

    }
}
