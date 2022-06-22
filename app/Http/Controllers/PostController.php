<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = Post::query()
            ->with(['author'])
            ->orderBy('created_at', 'desc')
            ->paginate();

        return PostResource::collection($posts);
    }
}
