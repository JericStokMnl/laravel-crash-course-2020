<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => request()->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        request()->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
