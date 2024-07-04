<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(AddPost $request)
    {
        $validated = $request->validated();
        $post = Post::create($validated);

        

        return response()->json($post);
    }
}
