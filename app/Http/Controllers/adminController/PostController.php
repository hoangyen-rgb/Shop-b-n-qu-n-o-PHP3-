<?php

namespace App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    public function hien(){
        return view('admin.page.post');
    }
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    public function show(Request $request)
    {
        return response()->json(Post::find($request->id));
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy(Request $request)
    {
        Post::findOrFail($request->id)->delete();
        return response()->json(null, 204);
    }
}
