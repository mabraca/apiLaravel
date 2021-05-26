<?php


namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Resources\PostsResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostsResource::collection(Posts::where('status',1)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->json()->all();
        Log::debug($data);
        Log::debug($data["title"]);
        Log::debug($request->user()->id);
        $post = Posts::create([
            'user_id' => $request->user()->id,
            'title' => $data["title"],
            'content' => $data["content"],
            'status' => $data["status"],
          ]);
    
          return new PostsResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PostsResource(Posts::where('id',$id)->get());
    }

    /**
     * Display all resources. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        return PostsResource::collection(Posts::all());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $post=Posts::where('id',$id)->first();
        Log::debug($post);
        Log::debug($post->user_id);
        Log::debug($request->json()->all()["data"]);
        $data = $request->json()->all()["data"];
        // check if currently authenticated user is the owner of the book
        if ($request->user()->id !== $post->user_id) {
            return response()->json(['error' => 'Este post no te pertence'], 403);
        }
        $post->update(['title'=>$data["title"], 'content'=>$data["content"],'status'=>$data["status"]]);

        return new PostsResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Posts::where('id',$id)->delete();
        return response()->json(null, 204);
    }
}
